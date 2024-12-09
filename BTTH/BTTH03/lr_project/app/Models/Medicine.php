<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà model này sẽ tương tác
    protected $table = 'medicines';

    // Định nghĩa các cột có thể được gán giá trị (mass assignable)
    protected $fillable = [
        'name',
        'brand',
        'dosage',
        'form',
        'price',
        'stock'
    ];

    // Định nghĩa quan hệ với bảng Sales (1 nhiều)
    public function sales()
    {
        return $this->hasMany(Sale::class, 'medicine_id', 'medicine_id');
    }
}
