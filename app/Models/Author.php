<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'jobdescription', 'bio', 'imageprofile'];

    // العلاقة مع الكتاب
    public function book()
    {
        return $this->hasOne(Book::class);
    }
}