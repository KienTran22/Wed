<!-- resources/views/issues/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi Tiết Vấn Đề</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $issue->id }}</li>
        <li class="list-group-item"><strong>Người Báo Cáo:</strong> {{ $issue->reported_by }}</li>
        <li class="list-group-item"><strong>Ngày Báo Cáo:</strong> {{ $issue->reported_date }}</li>
        <li class="list-group-item"><strong>Độ Ưu Tiên:</strong> {{ $issue->urgency }}</li>
        <li class="list-group-item"><strong>Trạng Thái:</strong> {{ $issue->status }}</li>
        <li class="list-group-item"><strong>Mô Tả:</strong> {{ $issue->description }}</li>
    </ul>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
</div>
@endsection
