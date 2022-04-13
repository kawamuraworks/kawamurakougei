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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    // 用途一覧
    public static function types() {
        $types = ['戸建住宅', '集合住宅', '個人店舗', '大規模店舗', 'その他'];

        return $types;
    }

    // 工事内容一覧
    public static function tags() {
        $tags = ['外壁施工', '内壁施工', 'オリジナルデザイン', 'その他'];

        return $tags;
    }

    // 実績一覧
    public static function lists() {
        $sort = 'priority';
        $lists = Detail::orderBy($sort, 'asc')->get();

        return $lists;
    }

    // バリデーション
    public static function validation($request) {
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

        return $inputs;
    }

}
