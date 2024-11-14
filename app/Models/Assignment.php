<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'subject_id', 'teacher_id', 'due_date'];

    // Relación con el profesor
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Relación con la materia
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relación con los estudiantes (muchos a muchos)
    public function students()
    {
        return $this->belongsToMany(User::class, 'assignment_user')->wherePivot('role', 'student');
    }
}
