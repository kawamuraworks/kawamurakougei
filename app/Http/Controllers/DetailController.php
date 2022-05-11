<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = 1;
        $detail = Detail::where('priority', 1)->first();
        $types = Detail::types(1, $detail);
        $tags = Detail::tags(1, $detail);
        $lists = Detail::lists();
        $images = Image::where('detail_id', $detail->id)->get();

        // $sort = 'path';
        // $imgae_list = Image::all()->groupBy('detail_id')->orderBy($sort, 'asc');
        // $a = Detail::all();
        $sort = 'detail_id';

        // $imgae_list = Image::with('detail')->whereHas('detail',
        // function($q){
        //         $q->where('priority', '>=', '1');
        // })->groupBy('detail_id')->get();

        // $imgae_list = Image::whereHas('detail', function($q)use($sort){
        //     $q->where('priority', '>=', '1');
        // })->get();

        $imgae_list = DB::table('details')
            ->join('images', 'details.id', '=', 'images.detail_id')
            ->select('details.*','images.path')
            ->distinct('details.priority')
            ->orderBy('details.priority', 'asc')
            ->get();

        for($i=0;$i<count($imgae_list);$i++) {
            $image_path[] = $imgae_list[$i]->path;
        }


        // $imgae_list = DB::table('images')
        //     ->join('details', 'details.id', '=', 'images.detail_id')
        //     ->select('images.*')
        //     ->distinct()
        //     ->get();

        // $imgae_list = Detail::
        //     join('images', 'details.id', 'images.detail_id')
        //     ->where('priority', '>=', '1')
        //     ->select('images.*')
        //     ->distinct()
        //     ->get();






        return view('work.index', compact('result', 'detail', 'types', 'tags', 'lists', 'images', 'image_path'));
    }

    public function priority(Request $request)
    {
        $result = $request->priority;
        $detail = Detail::where('priority', $result)->first();
        $types = Detail::types(1, $detail);
        $tags = Detail::tags(1, $detail);
        $lists = Detail::lists();
        $images = Image::where('detail_id', $detail->id)->get();

        $imgae_list = DB::table('details')
        ->join('images', 'details.id', '=', 'images.detail_id')
        ->select('details.*','images.path')
        ->distinct('details.priority')
        ->orderBy('details.priority', 'asc')
        ->get();

        for($i=0;$i<count($imgae_list);$i++) {
            $image_path[] = $imgae_list[$i]->path;
        }



        return view('work.index', compact('result', 'detail', 'types', 'tags', 'lists', 'images', 'image_path'));
    }

    public function list()
    {
        return view('admin.list');
    }

    public function select()
    {
        $lists = Detail::lists();

        return view('admin.select', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Detail $detail)
    {
        $types = Detail::types(0, $detail);
        $tags = Detail::tags(0, $detail);

        return view('admin.create', compact('types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 【MySQL用】AWSではこちら？
    // public function store(Request $request, Detail $detail)
    // {
    //     Detail::validation($request);
    //     Detail::storeDetailsTable($request, $detail);
    //     Image::storeImagesTable($request, $detail);

    //     return redirect()->route('admin.select')->with('message', '投稿を作成しました');
    // }

    // 【SQLSTATE用】Herokuで使用
    public function store(Request $request, Detail $detail)
    {
        Detail::validation($request);
        Detail::storeDetailsTable($request, $detail);

        $count = count($request->file('image_'));
        for ($i = 0; $i < $count; $i++) {
            $image = new Image();
            $image->detail_id = $detail->id;

            //POSTされた画像ファイルデータ取得しbase64でエンコードする
            $image->path = base64_encode(file_get_contents($request->image_[$i]->getRealPath()));
            $image->img_content = $request->img_content_[$i];

            $image->save();
        }



        // Image::storeImagesTable($request, $detail);

        return redirect()->route('admin.select')->with('message', '投稿を作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit($admin, Detail $detail, Image $images)
    {
        // 【備忘録】$adminはパラメータ(URLにある数値)よりDetailsテーブルのidを取得する
        $detail = Detail::where('id', $admin)->first();
        $types = Detail::types(0, $detail);
        $tags = Detail::tags(0, $detail);
        $display = Detail::display();
        $images = Image::where('detail_id', $admin)->get();

        return view('admin.edit', compact('detail', 'types', 'tags', 'display', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail, Image $image)
    {
        Detail::validation($request);
        Detail::editPriority($request, $detail);

        // 更新対象となる行(イメージテーブル情報)を取得する
        $target = Image::where('detail_id', $request->id)->get();
        $count = count($target);
        Image::onlyEditContent($request, $target, $count);
        Image::includeEditImages($request, $image, $target, $count);

        return redirect()->route('admin.select')->with('message', '内容を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Detail $detail, Image $image)
    {
        // storageにある画像フォルダ及びimagesテーブルの内容削除
        Storage::deleteDirectory('public/work_' . $request->id);
        Image::where('detail_id', $request->id)->delete();

        // 実績削除後、削除実績より下のpriorityを1繰り上げる
        $delete_priority = Detail::where('priority', '>=', $request->priority);
        $delete_priority->decrement('priority', 1);
        Detail::where('id', $request->id)->delete();

        return redirect()->route('admin.select')->with('message', '実績を削除しました');
    }
}
