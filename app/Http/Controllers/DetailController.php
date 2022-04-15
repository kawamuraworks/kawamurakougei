<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Image;
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
        $detail = Detail::where('priority', 1)->first();
        $types = Detail::types();
        $tags = Detail::tags();
        $lists = Detail::lists();
        $images = Image::where('detail_id', $detail->id)->get();

        return view('work.index', compact('detail', 'types', 'tags', 'lists', 'images'));
    }

    public function priority(Request $request)
    {
        $result = $request->priority;
        $detail = Detail::where('priority', $result)->first();
        $types = Detail::types();
        $tags = Detail::tags();
        $lists = Detail::lists();
        $images = Image::where('detail_id', $detail->id)->get();

        return view('work.index', compact('detail', 'types', 'tags', 'lists', 'images'));
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
    public function create()
    {
        $types = Detail::types();
        $tags = Detail::tags();

        return view('admin.create', compact('types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Detail $detail)
    {
        Detail::validation($request);
        Detail::storeDetailsTable($request, $detail);
        Image::storeImagesTable($request, $detail);

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
        $types = Detail::types();
        $tags = Detail::tags();
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
        Image::onlyEditContent($request,$target,$count);
        Image::includeEditImages($request,$image,$target,$count);

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
