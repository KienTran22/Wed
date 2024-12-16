<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề
    public function index()
    {
        $issues = Issue::with('computer')->get();
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form thêm vấn đề
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm.');
    }

    // Hiển thị thông tin chi tiết vấn đề
    public function show(Issue $issue)
    {
        return view('issues.show', compact('issue'));
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit(Issue $issue)
    {
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật.');
    }

    // Xóa vấn đề
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa.');
    }
}
