<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'user_id', 'headline', 'period', 'request', 'lead', 'location',
        'type1', 'type2', 'type3', 'content_tag1', 'content_tag2', 'content_tag3'
    ];
}
