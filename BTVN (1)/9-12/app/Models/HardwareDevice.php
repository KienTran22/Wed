<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareDevice extends Model
{
    use HasFactory;

    // Mối quan hệ N - 1: Mỗi thiết bị thuộc về một trung tâm
    public function itCenter()
    {
        return $this->belongsTo(ItCenter::class);
    }
}
