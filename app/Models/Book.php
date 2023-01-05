<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author', 
        'departmentID',
        'teacherID',
        'company',
        'year',
        'description',
        'file'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacherID');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'departmentID');
    }
}
