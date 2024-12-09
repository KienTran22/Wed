<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    // Mối quan hệ 1 - N: Một người thuê có thể thuê nhiều laptop
    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}
