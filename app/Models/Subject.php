<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'teacher_id'];

    // Relación con el usuario que es el profesor
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
