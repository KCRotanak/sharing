<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_table extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectID','departmentID',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class , 'subjectID'); 
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID'); 
    }
}
