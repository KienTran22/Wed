<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Đặt tên bảng trong cơ sở dữ liệu, nếu không giống với tên mặc định (Students)
    protected $table = 'students';

    // Các thuộc tính có thể gán giá trị
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'parent_phone', 'class_id'];

    // Quan hệ: Một học sinh thuộc về một lớp học
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
