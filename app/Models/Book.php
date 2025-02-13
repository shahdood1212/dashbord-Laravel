<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'pages', 'price' , 'student_id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
