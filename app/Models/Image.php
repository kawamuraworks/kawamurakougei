<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }

    protected $fillable = [
        'detail_id ', 'path', 'img_content'
    ];

    // // 【MySQL用】AWSではこちら？
    // // 新規登録(create)時のImagesテーブルへの登録
    public static function storeImagesTable($request, $detail)
    {
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

            // 画像説明文の保存
            $image->img_content = $request->img_content_[$i];
            $image->save();
        }
    }

    // 【SQLSTATE用】Herokuで使用
    // 新規登録(create)時のImagesテーブルへの登録。Herokuではフォルダの作成ができないので、画像をDBにバイナリ保存する。
    public static function storeImagesTableForHeroku($request, $detail)
    {
        $count = count($request->file('image_'));
        for ($i = 0; $i < $count; $i++) {
            $image = new Image();
            $image->detail_id = $detail->id;

            //POSTされた画像ファイルデータ取得しbase64でエンコードする
            $image->path = base64_encode(file_get_contents($request->image_[$i]->getRealPath()));
            $image->img_content = $request->img_content_[$i];

            $image->save();
        }
    }




    // 【MySQL用】AWSではこちら？
    //  // 説明文のみを編集するメソッド
     public static function onlyEditContent($request,$target,$count) {
        // 編集する行(情報)をまとめる
        $updates = [];
        // 編集する行の情報を配列で生成する
        for ($i = 0; $i < $count; $i++) {
            $temp = ['id' => $target[$i]->id, 'detail_id' => $target[$i]->detail_id, 'path' => $target[$i]->path, 'img_content' => $request->img_content_[$i]];
            array_push($updates, $temp);
        };
        // 第一引数に更新内容すべて、第二引数にどこの値を基準に更新するかを設定、第三引数に更新したい列名を設定
        Image::upsert($updates, ['id', 'detail_id'], ['img_content']);
    }

    // 【SQLSTATE用】Herokuで使用
    // 説明文のみを編集するメソッド。Herokuではupsert()が使えない。
    public static function onlyEditContentForHeroku($request, $target, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $image = $target[$i];
            $image->img_content = $request->img_content_[$i];
            $image->update();
        }
    }

    // // 【MySQL用】AWSではこちら？
    // // 画像の差替え・追加を含む編集をするメソッド
    public static function includeEditImages($request, $image, $target, $count)
    {
        if (isset($request->image_)) {
            $images = $request->image_;
            $key = array_keys($images);

            foreach ($key as $v) {
                // if → 画像の差替え処理。 elseif → 画像の追加処理。
                // 【備忘録】$keyは配列なので0スタート、$countは更新する枚数なので比べるには-1する必要がある。
                if ($count - 1 >= $v) {
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
    }


    // 【SQLSTATE用】Herokuで使用
    // 画像の差替え・追加を含む編集をするメソッド。Herokuではシンボリックリンクが機能しないので、publicに直接保存する。
    public static function includeEditImagesForHeroku($request, $image, $target, $count)
    {
        if (isset($request->image_)) {
            $images = $request->image_;
            $key = array_keys($images);

            foreach ($key as $v) {
                // if → 画像の差替え処理。 elseif → 画像の追加処理。
                // 【備忘録】$keyは配列なので0スタート、$countは更新する枚数なので比べるには-1する必要がある。
                if ($count - 1 >= $v) {
                    for ($i = 0; $i < $count; $i++) {
                        $image = $target[$i];
                        $image->path = base64_encode(file_get_contents($request->image_[$i]->getRealPath()));
                        $image->img_content = $request->img_content_[$i];
                        $image->update();
                    }
                } elseif ($count <= $v) {
                    $image = new Image();
                    $image->detail_id = $target[0]->detail_id;
                    $image->path = base64_encode(file_get_contents($request->image_[$v]->getRealPath()));
                    $image->img_content = $request->img_content_[$v];
                    $image->save();
                }
            }
        }
    }
}
