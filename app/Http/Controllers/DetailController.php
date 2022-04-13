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
    public function store(Request $request, Detail $detail, Image $image)
    {
        $inputs = Detail::validation($request);


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
            $image = new Image();
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
    public function update(Request $request, Detail $detail, Image $image)
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
            'priority' => 'required|integer',

            // imagesテーブル
            'img_content_' => 'required|max:255',
            'image_[]' => 'image|max:1024', // ←【注意】〇枚目を上手く表示されるために0から始める。1から始めると別途修正が必要
        ]);

        // 【detailsテーブル】
        $detail = Detail::where('id', $request->id)->first(); // 【備忘録】->first()で$detailのデータを取り出さないとエラーになる。
            // 優先順位が下から上に変更する時のメソッド
        $add_priority = Detail::where('priority', '>=', $request->priority)->where('priority', '<', $detail->priority);
        $add_priority->increment('priority', 1);

            // 優先順位が上から下に変更する時のメソッド
        $delete_priority = Detail::where('priority', '<=', $request->priority)->where('priority', '>', $detail->priority);
        $delete_priority->decrement('priority', 1);

            // priorityの書き換え後、必要なdetail情報の更新
        $detail->fill($request->all());
        unset($detail['_token']);
        $detail->update();


        // 【imagesテーブル】
        // 画像説明文のみ変更
        // 最初の更新対象となる行を取得する
        $target = Image::where('detail_id', $request->id)->get();
        // 何行更新するかを決める
        $count = count($target);
        // 更新行まとめ
        $updates = [];
        // 更新する行の情報を配列で生成する
        for ($i = 0; $i < $count; $i++) {
            $temp = ['id' => $target[$i]->id, 'detail_id' => $target[$i]->detail_id, 'path' => $target[$i]->path, 'img_content' => $request->img_content_[$i]];
            array_push($updates, $temp);
        };
        // 第一引数に更新内容すべて、第二引数にどこの値を基準に更新するかを設定、第三引数に更新したい列名を設定
        Image::upsert($updates, ['id', 'detail_id'], ['img_content']);


        // 画像の差替え・追加
        if (isset($request->image_)) {
            $images = $request->image_;
            $key = array_keys($images);

            foreach ($key as $v) {
                // if → 画像の差替え処理。 elseif → 画像の追加処理。
                if ($count-1 >= $v) {
                    $input = $request->file('image_')[$v];
                    $original = $input->getClientOriginalName();
                    $image_kind =  explode(".", $original);
                    $image_name = 'works_' . $target[0]->detail_id . '_' . $v . '.' . end($image_kind);
                    $input->move('storage/work_' . $target[0]->detail_id, $image_name);

                    $image->path = 'storage/work_' . $target[0]->detail_id;
                    $image->img_content = $request->img_content_[$v];
                    $image->update();
                } elseif ($count <= $v) {
                    $image = new Image();
                    $input = $request->file('image_')[$v];
                    $original = $input->getClientOriginalName();
                    $image_kind =  explode(".", $original);
                    $image_name = 'works_' . $target[0]->detail_id . '_' . $v . '.' . end($image_kind);
                    $input->move('storage/work_' . $target[0]->detail_id, $image_name);

                    $image->detail_id = $target[0]->detail_id;
                    $image->path = 'storage/work_' . $target[0]->detail_id;
                    $image->img_content = $request->img_content_[$v];
                    $image->save();
                }
            }
        }

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
