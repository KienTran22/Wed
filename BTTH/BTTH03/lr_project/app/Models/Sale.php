<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà model này sẽ tương tác
    protected $table = 'sales';

    // Định nghĩa các cột có thể được gán giá trị (mass assignable)
    protected $fillable = [
        'medicine_id',
        'quantity',
        'sale_date',
        'customer_phone'
    ];

    // Định nghĩa quan hệ với bảng Medicines (Nhiều về 1)
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'medicine_id');
    }
}
