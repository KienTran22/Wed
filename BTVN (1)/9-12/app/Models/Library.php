<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    // Mối quan hệ 1 - N: Một thư viện có thể có nhiều sách
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
