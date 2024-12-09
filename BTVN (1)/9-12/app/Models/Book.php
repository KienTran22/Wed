<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Mối quan hệ N - 1: Mỗi sách thuộc về một thư viện
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
