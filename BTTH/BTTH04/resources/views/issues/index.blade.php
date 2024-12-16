<!-- resources/views/issues/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh Sách Vấn Đề</h1>
    <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Tạo Vấn Đề Mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người Báo Cáo</th>
                <th>Ngày Báo Cáo</th>
                <th>Độ Ưu Tiên</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
