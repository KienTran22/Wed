<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    // Đặt tên bảng trong cơ sở dữ liệu, nếu không giống với tên mặc định (Classrooms)
    protected $table = 'classes';

    // Các thuộc tính có thể gán giá trị
    protected $fillable = ['grade_level', 'room_number'];

    // Quan hệ: Một lớp học có thể có nhiều học sinh
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
