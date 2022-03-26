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
            'img_content' => 'required|max:255',

            // works_listsテーブル
            'image0' => 'image|max:1024'
        ]);

        // detailsテーブル
        $detail = new Detail();
        $detail->fill($request->all());
        $detail->fill(['user_id' => auth()->user()->id]);
        unset($detail['_token']);
        $detail->save();

        // imagesテーブル
        $i=1;
        $works_img = new Image();
        $works_img->detail_id = $detail->id;
        $works_img->img_content = $request->img_content;

        // 画像名を設定する。
        $original = request()->file('image0')->getClientOriginalName();
        $img_kind =  explode(".",$original);
        $works_img_name = 'works_' . $detail->id .'_'. $i . '.' . end($img_kind);

        request()->file('image0')->move('storage/work_'. $detail->id, $works_img_name);
        $works_img->path = 'storage/work_'. $detail->id;

        $works_img->save();

        // $i=0;
        // $original = request()->file('image'.$i)->getClientOriginalName();
        // $name = date('Ymd_His').'_'.$original;
        // request()->file('image'.$i)->move('storage/images'.$i, $name);
        // $works_img->image = $name;
        // $works_img->save();
        $i++;


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
