<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function assign(Request $request, Assignment $assignment)
    {
        $assignment->students()->attach($request->student_id);
        return redirect()->back()->with('success', 'Assignment assigned successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'subject_id' => 'required',
            'due_date' => 'required|date',
        ]);

        $assignment = Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'teacher_id' => auth()->id(),
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully.');
    }

    public function studentAssignments()
    {
        $assignments = auth()->user()->assignments;
        return view('student.assignments', compact('assignments'));
    }
}
