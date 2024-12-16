<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Route;


// Đường dẫn hiển thị danh sách đồ án (trang chủ)

Route::get('/', [IssuesController::class, 'index'])->name('theses.index');

// Đường dẫn để tạo mới một đồ án (hiển thị form thêm mới)
Route::get('/issues/create', [IssuesController::class, 'create'])->name('issues.create');

// Đường dẫn để lưu dữ liệu đồ án mới (thực hiện thêm mới)
Route::post('/issues', [IssuesController::class, 'store'])->name('issues.store');

// Đường dẫn để hiển thị chi tiết một đồ án cụ thể (tuỳ chọn)
Route::get('/issues/{id}', [IssuesController::class, 'show'])->name('issues.show');

// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssuesController::class, 'edit'])->name('issues.edit');

// Đường dẫn để cập nhật thông tin đồ án (thực hiện cập nhật)
Route::put('/issues/{id}', [IssuesController::class, 'update'])->name('issues.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/issues/{id}', [IssuesController::class, 'destroy'])->name('issues.destroy');
Route::get('/', function () {
    return view('welcome');
});