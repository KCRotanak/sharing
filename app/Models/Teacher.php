<?php
 
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Teacher extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    protected $fillable = [
        'name', 'email','phone'
    ];
    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }
}