<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'headline', 'period', 'cs_request', 'lead', 'location',
        'type1', 'type2', 'type3', 'content_tag1', 'content_tag2', 'content_tag3', 'priority', 'is_detail_deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // 用途一覧
    public static function types($flag, $detail)
    {
        $type_name = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];
        $has_type = [$detail->type1, $detail->type2, $detail->type3];

        if ($flag == 0) {
            $types = $type_name;
            return $types;
        } elseif ($flag == 1) {
            foreach ($has_type as $k => $v) {
                if($v != '') {
                    $types[$k]['num'] = $v;
                    $types[$k]['name'] = $type_name[$v];
                    continue;
                }
            }
            return $types;
        }
    }

    // 工事内容一覧
    public static function tags($flag, $detail)
    {
        $tag_name = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];
        $has_tag = [$detail->content_tag1, $detail->content_tag2, $detail->content_tag3];

        if ($flag == 0) {
            $tags = $tag_name;
            return $tags;
        } elseif ($flag == 1) {
            foreach ($has_tag as $k=>$v) {
                if($v != '') {
                    $tags[$k]['num'] = $v;
                    $tags[$k]['name'] = $tag_name[$v];
                    continue;
                }
            }
            return $tags;
        }
    }

    // 実績変更一覧(select)ページで「表示・非表示」
    public static function display()
    {
        $display = ['表示', '非表示'];

        return $display;
    }

    // 実績一覧
    public static function lists()
    {
        $sort = 'priority';
        $lists = Detail::orderBy($sort, 'asc')->get();

        return $lists;
    }

    // バリデーションルール
    public static function validation($request)
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
    }

    // 新規登録(create)時のDetailsテーブルへの登録
    public static function storeDetailsTable($request, $detail)
    {
        $detail->fill(['user_id' => auth()->user()->id]);
        $detail->fill($request->all());
        $detail->priority = 1;
        $detail->is_detail_deleted = 1;
        unset($detail['_token']);

        // 新規登録は優先順位1とするため、これまで登録してきた実績は+1とする
        $add_priority = Detail::where('priority', '>=', 1);
        $add_priority->increment('priority', 1);

        $detail->save();
    }

    // 優先順位を変更するメソッド
    public static function editPriority($request, $detail)
    {
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
    }
}
