<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItCenter extends Model
{
    use HasFactory;

    // Mối quan hệ 1 - N: Một trung tâm có thể có nhiều thiết bị phần cứng
    public function hardwareDevices()
    {
        return $this->hasMany(HardwareDevice::class);
    }
}
