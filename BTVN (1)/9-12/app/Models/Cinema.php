<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    // Mối quan hệ 1 - N: Một rạp chiếu có thể chiếu nhiều phim
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
