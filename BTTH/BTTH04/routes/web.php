<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
Route::resource('issues', IssueController::class);
// Hiển thị danh sách vấn đề
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');

// Hiển thị form tạo mới vấn đề
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

// Lưu vấn đề mới
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Hiển thị chi tiết một vấn đề
Route::get('/issues/{issue}', [IssueController::class, 'show'])->name('issues.show');

// Hiển thị form chỉnh sửa
Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit');

// Cập nhật thông tin vấn đề
Route::put('/issues/{issue}', [IssueController::class, 'update'])->name('issues.update');

// Xóa một vấn đề
Route::delete('/issues/{issue}', [IssueController::class, 'destroy'])->name('issues.destroy');
