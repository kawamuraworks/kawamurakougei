<?php

namespace App\Http\Controllers;

use App\Models\Detail;
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
        $detail = new Detail();
        $detail->user_id = auth()->user()->id;
        $detail->headline = $request->headline;
        $detail->period = $request->period;
        $detail->request = $request->request;
        $detail->lead = $request->lead;
        $detail->location = $request->location;
        $detail->type1 = $request->type1;
        $detail->type2 = $request->type2;
        $detail->type3 = $request->type3;
        $detail->content_tag1 = $request->content_tag1;
        $detail->content_tag2 = $request->content_tag2;
        $detail->content_tag3 = $request->content_tag3;
        $detail->save();

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
