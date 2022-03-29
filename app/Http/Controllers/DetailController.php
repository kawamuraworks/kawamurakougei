<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Image;
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
        //
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

            // works_listsテーブル
            'image_0' => 'image|max:1024', // ←【注意】〇枚目を上手く表示されるために0から始める。1から始めると別途修正が必要
        ]);

        // 【detailsテーブル】
        $detail = new Detail();
        $detail->fill($request->all());
        $detail->fill(['user_id' => auth()->user()->id]);
        unset($detail['_token']);
        $detail->save();


        // $tt[] = '';
        for($i=0; $i<count($request->file('image_')); $i++) {
            $tt[$i]['image'] =$request->file('image_')[$i];
            $tt[$i]['content'] = $request->img_content_[$i];

            $temp_img =$request->file('image_')[$i];
            $temp_content = $request->img_content_[$i];
            // $i++;
        }
        dd($tt);

        // 【imagesテーブル】
        // 画像と説明文を多次元配列として保存
        $img_all[] = $request->file('image_');
        $img_all[] = $request->img_content_;

        $count = count($request->file('image_'));
        for ($i = 0; $i < $count; $i++) {
            $works_img = new Image();
            $works_img->detail_id = $detail->id;

            // 多次元配列を分解して画像名を作成
            $input = array_column($img_all, $i);
            $original = $input[0]->getClientOriginalName();
            $img_kind =  explode(".", $original);
            $works_img_name = 'works_' . $detail->id . '_' . $i . '.' . end($img_kind);

            // 作成した画像名でpublicフォルダに移動
            $input[0]->move('storage/work_' . $detail->id, $works_img_name);
            $works_img->path = 'storage/work_' . $detail->id;

            $works_img->img_content = $input[1];

            $works_img->save();
        }

        // 登録する画像名の設定
        // foreach($request->file('image_') as $k =>$v) {
        //     $original = $v->getClientOriginalName();
        //     $img_kind =  explode(".", $original);
        //     $works_img_name = 'works_' . $detail->id . '_' . $k . '.' . end($img_kind);

        //     画像をpublicへ移動して保存・pathをDBに登録
        //     $v->move('storage/work_' . $detail->id, $works_img_name);
        //     $works_img->path = 'storage/work_' . $detail->id;
        //     dd($works_img->path);
        // }
        // 画像説明文をDBに登録
        // foreach($request->img_content_ as $v) {
        //     $works_img->img_content = $v;
        // }
        // $works_img->save();




        /*
        【メイン登録のみ】imagesテーブル
        $works_img = new Image();
        $works_img->detail_id = $detail->id;

        登録する画像名の設定
        $original = $request->file('image_0')->getClientOriginalName();
        $img_kind =  explode(".", $original);
        $works_img_name = 'works_' . $detail->id . '_' . 0 . '.' . end($img_kind);

        画像をpublicへ移動して保存・pathをDBに登録
        $request->file('image_0')->move('storage/work_' . $detail->id, $works_img_name);
        $works_img->path = 'storage/work_' . $detail->id;

        画像説明文をDBに登録
        $works_img->img_content = $request->img_content;

        $works_img->save();
        */




        // $i=0;
        // $original = request()->file('image'.$i)->getClientOriginalName();
        // $name = date('Ymd_His').'_'.$original;
        // request()->file('image'.$i)->move('storage/images'.$i, $name);
        // $works_img->image = $name;
        // $works_img->save();


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
