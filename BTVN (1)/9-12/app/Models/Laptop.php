<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    // Mối quan hệ N - 1: Mỗi laptop thuộc về một người thuê
    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }
}
