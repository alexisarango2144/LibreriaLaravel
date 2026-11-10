<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author_id',
        'publication_year',
        'description',
        'isbn',
        'stock'
    ];
}
