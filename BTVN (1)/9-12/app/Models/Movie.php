<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Mối quan hệ N - 1: Mỗi phim thuộc về một rạp chiếu
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
