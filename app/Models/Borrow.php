<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'book_title',
        'author',
        'description',
        'book_cover',
        'name',
        'email',
        'student_id',
        'date_borrow',
        'date_return',
    ];

    // Define the relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
