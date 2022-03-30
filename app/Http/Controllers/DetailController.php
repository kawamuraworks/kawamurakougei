<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Image;
use App\Models\WorksList;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::all();
        $image = Image::where('detail_id', 1)->get();

        return view('admin.index', compact('detail', 'image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];
        $tags = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];

        $param = ['types' => $types, 'tags' => $tags];

        return view('admin.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            // detailsテーブル
            'headline' => 'required|max:255',
            'period' => 'required|max:255',
            'cs_request' => 'required|max:255',
            'lead' => 'required',
            'location' => 'required|max:255',
            'type1' => 'required',
            'content_tag1' => 'required',

            // imagesテーブル
            'img_content_' => 'required|max:255',
            'image_[]' => 'image|max:1024', // ←【注意】〇枚目を上手く表示されるために0から始める。1から始めると別途修正が必要
        ]);

        // 【detailsテーブル】
        $detail = new Detail();
        $detail->fill(['user_id' => auth()->user()->id]);
        $detail->fill($request->all());
        unset($detail['_token']);
        $detail->save();

        // 島田さんアイデア
        // $tt[] = '';
        // for($i=0; $i<count($request->file('image_')); $i++) {
        //     $tt[$i]['image'] =$request->file('image_')[$i];
        //     $tt[$i]['content'] = $request->img_content_[$i];
        //     $i++;
        // }

        // 【imagesテーブル】
        $count = count($request->file('image_'));
        for ($i = 0; $i < $count; $i++) {
            $works_img = new Image();
            $works_img->detail_id = $detail->id;

            // 登録する画像名の作成
            $input = $request->file('image_')[$i];
            $original = $input->getClientOriginalName();
            $img_kind =  explode(".", $original);
            $works_img_name = 'works_' . $detail->id . '_' . $i . '.' . end($img_kind);

            // storageに保存ファイルの作成・画像の登録
            $input->move('storage/work_' . $detail->id, $works_img_name);
            $works_img->path = 'storage/work_' . $detail->id;

            // 説明文の保存
            $works_img->img_content = $request->img_content_[$i];

            $works_img->save();
        }

        // 【works_listsテーブル】
        $list = new WorksList();
        $list->image_id = $works_img->id - $count + 1;
        $list->priority = $detail->id;
        $list->is_detail_deleted = 1;
        $list->save();


        // 【imagesテーブル】
        // 【複雑過ぎ】画像と説明文を多次元配列として保存
        // $img_all[] = $request->file('image_');
        // $img_all[] = $request->img_content_;

        // $count = count($request->file('image_'));
        // for ($i = 0; $i < $count; $i++) {
        //     $works_img = new Image();
        //     $works_img->detail_id = $detail->id;

        //     多次元配列を分解して画像名を作成
        //     $input = array_column($img_all, $i);
        //     $original = $input[0]->getClientOriginalName();
        //     $img_kind =  explode(".", $original);
        //     $works_img_name = 'works_' . $detail->id . '_' . $i . '.' . end($img_kind);

        //     作成した画像名でpublicフォルダに移動
        //     $input[0]->move('storage/work_' . $detail->id, $works_img_name);
        //     $works_img->path = 'storage/work_' . $detail->id;

        //     $works_img->img_content = $input[1];

        //     $works_img->save();
        // }

        return redirect()->route('admin.create')->with('message', '投稿を作成しました');
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
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
