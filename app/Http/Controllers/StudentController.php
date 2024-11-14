<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }

    public function viewSubjects()
    {
        $subjects = auth()->user()->subjects;
        return view('student.view_subjects', compact('subjects'));
    }

    public function viewSubjectDetails($id)
    {
        $subject = Subject::findOrFail($id);
        return view('student.view_subject_details', compact('subject'));
    }
}
