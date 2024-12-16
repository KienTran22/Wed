<!-- resources/views/issues/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo Vấn Đề Mới</h1>
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="reported_by">Người Báo Cáo</label>
            <input type="text" name="reported_by" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reported_date">Ngày Báo Cáo</label>
            <input type="date" name="reported_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="urgency">Độ Ưu Tiên</label>
            <select name="urgency" class="form-control">
                <option value="Low">Thấp</option>
                <option value="Medium">Trung Bình</option>
                <option value="High">Cao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
