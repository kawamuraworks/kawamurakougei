<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function detail() {
        return $this->belongsTo(Detail::class);
    }

    public function works_list() {
        return $this->belongsTo(WorksList::class);
    }

    protected $fillable = [
        'detail_id ', 'pass', 'img_content'
    ];

}
