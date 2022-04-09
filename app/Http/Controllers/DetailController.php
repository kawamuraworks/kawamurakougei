<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Image;
use Illuminate\Http\Request;
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
        $detail = Detail::where('priority',1)->first();
        $types = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];
        $tags = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];

        $images = Image::where('detail_id',$detail->id)->get();

        $sort = 'priority';
        $lists = Detail::orderBy($sort, 'asc')->get();

        return view('work.index', compact('detail', 'types', 'tags', 'images', 'sort', 'lists'));
    }

    public function priority(Request $request)
    {
        $result = $request->priority;
        $detail = Detail::where('priority',$result)->first();
        $types = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];
        $tags = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];

        $images = Image::where('detail_id',$detail->id)->get();

        $sort = 'priority';
        $lists = Detail::orderBy($sort, 'asc')->get();

        return view('work.index', compact('detail', 'types', 'tags', 'images', 'sort', 'lists'));
    }

    public function select()
    {
        $sort = 'priority';
        $detail = Detail::orderBy($sort, 'asc')->get();

        return view('admin.select', compact('sort', 'detail'));
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
    public function store(Request $request, Detail $detail, Image $image)
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
        $detail->fill(['user_id' => auth()->user()->id]);
        $detail->fill($request->all());
        $detail->is_detail_deleted = 1;
        unset($detail['_token']);
        $detail->save();

        // priorityは重複させない。$detail->idを使用するため2回に分けて保存
        $detail->priority = $detail->id;
        $detail->save();

        // 【imagesテーブル】
        $count = count($request->file('image_'));
        for ($i = 0; $i < $count; $i++) {
            $image->detail_id = $detail->id;

            // 登録する画像名の作成
            $input = $request->file('image_')[$i];
            $original = $input->getClientOriginalName();
            $img_kind =  explode(".", $original);
            $image_name = 'works_' . $detail->id . '_' . $i . '.' . end($img_kind);

            // storageに保存ファイルの作成・画像の登録
            $input->move('storage/work_' . $detail->id, $image_name);
            $image->path = 'storage/work_' . $detail->id;

            // 説明文の保存
            $image->img_content = $request->img_content_[$i];

            $image->save();
        }

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
    public function edit($admin, Detail $detail, Image $images)
    {
        $detail = Detail::where('id', $admin)->first();
        $types = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];
        $tags = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];
        $display = ['表示', '非表示'];

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
    public function update(Request $request, Detail $detail)
    {
        $detail = Detail::where('id', $request->id)->first();// 【備忘録】->first()で$detailのデータを取り出さないとエラーになる。
        $inputs = $request->validate([
            // detailsテーブル
            'headline' => 'required|max:255',
            'period' => 'required|max:255',
            'cs_request' => 'required|max:255',
            'lead' => 'required',
            'location' => 'required|max:255',
            'type1' => 'required',
            'content_tag1' => 'required',
            'priority' => 'required|integer',

            // imagesテーブル
            'img_content_' => 'required|max:255',
            'image_[]' => 'image|max:1024', // ←【注意】〇枚目を上手く表示されるために0から始める。1から始めると別途修正が必要
        ]);

        // 【detailsテーブル】
        $detail->fill($request->all());
        unset($detail['_token']);
        unset($detail['priority']);
        $detail->update();

        $sort = 'priority';
        $has_priority = Detail::orderBy($sort, 'asc')->get();
        $count = count($has_priority);

        for($i=0; $i<$count; $i++) {
            if($has_priority[$i]->priority < $request->priority) {
                $has_priority[$i] = Detail::where('priority', $i)->first();
                unset($has_priority[$i]['_token']);
                $has_priority[$i]->update();
            } elseif($has_priority[$i]->priority == $request->priority) {
                $has_priority[$i] = Detail::where('priority', $i)->first();
                unset($has_priority[$i]['_token']);
                $has_priority[$i] = $has_priority->priority+1;
                $has_priority[$i]->update();
            } elseif($has_priority[$i]->priority > $request->priority) {
                $has_priority[$i] = Detail::where('priority', $i)->first();
                unset($has_priority[$i]['_token']);
                $has_priority[$i] = $has_priority->priority+1;
                $has_priority[$i]->update();
            } elseif(!isset($has_priority[$i]->priority)) {
                $has_priority[$i] = Detail::where('priority', $i)->first();
                unset($has_priority[$i]['_token']);
                $has_priority[$i] = $has_priority->priority;
                $has_priority[$i]->update();
            }
        }

        // for($i=1; $i<=$count; $i++) {
        //     if($detail[$i]->priority == $inputs['priority']) {
        //         $detail = $detail->where('priority', $i)->increment('priority');
        //     }
        // }


        // for($i=0; $i<$count; $i++) {
        //     $detail = Detail::where('id', $i)->select('id', 'priority');
        //     if($detail->priority < $request->priority) {
        //         $detail = $detail->priority;
        //     } elseif($detail->priority == $request->priority) {
        //         $detail = $request->priority;
        //     } else {
        //         $has_priority = $has_priority[$i+1];
        //     }
        //     $has_priority->update();
        // }




        // // 【imagesテーブル】
        // $count = count($request->file('image_'));
        // for ($i = 0; $i < $count; $i++) {
        //     $works_img = new Image();
        //     $works_img->detail_id = $detail->id;

        //     // 登録する画像名の作成
        //     $input = $request->file('image_')[$i];
        //     $original = $input->getClientOriginalName();
        //     $img_kind =  explode(".", $original);
        //     $works_img_name = 'works_' . $detail->id . '_' . $i . '.' . end($img_kind);

        //     // storageに保存ファイルの作成・画像の登録
        //     $input->move('storage/work_' . $detail->id, $works_img_name);
        //     $works_img->path = 'storage/work_' . $detail->id;

        //     // 説明文の保存
        //     $works_img->img_content = $request->img_content_[$i];

        //     $works_img->save();
        // }



        return redirect()->route('admin.select')->with('message', '内容を変更しました');
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
