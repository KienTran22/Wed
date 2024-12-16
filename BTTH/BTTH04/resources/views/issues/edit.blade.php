<!-- resources/views/issues/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Vấn Đề</h1>
    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="reported_by">Người Báo Cáo</label>
            <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
        </div>

        <div class="form-group">
            <label for="reported_date">Ngày Báo Cáo</label>
            <input type="date" name="reported_date" class="form-control" value="{{ $issue->reported_date }}" required>
        </div>

        <div class="form-group">
            <label for="urgency">Độ Ưu Tiên</label>
            <select name="urgency" class="form-control">
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Trung Bình</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>Cao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Mô Tả</label>
            <textarea name="description" class="form-control" rows="3">{{ $issue->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection
