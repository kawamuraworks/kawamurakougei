<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksList extends Model
{
    use HasFactory;

    public function image() {
        return $this->belongsTo(Image::class);
    }

    protected $fillable = [
        'image_id', 'priority', 'is_detail_deleted'
    ];
}
