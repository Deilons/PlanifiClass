<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard');
    }

    public function manageSubjects()
    {
        $subjects = Subject::where('teacher_id', auth()->id())->get();
        return view('teacher.manage_subjects', compact('subjects'));
    }

    public function createSubject()
    {
        return view('teacher.create_subject');
    }

    public function storeSubject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'teacher_id' => auth()->id(),
        ]);

        return redirect()->route('teacher.manageSubjects')->with('success', 'Subject created successfully');
    }

    public function editSubject($id)
    {
        $subject = Subject::findOrFail($id);
        return view('teacher.edit_subject', compact('subject'));
    }

    public function updateSubject(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update($validated);
        return redirect()->route('teacher.manageSubjects')->with('success', 'Subject updated successfully');
    }

    public function deleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('teacher.manageSubjects')->with('success', 'Subject deleted successfully');
    }
}
