<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        'book_name',
        'barkod_no',
        'page_number',
        'price',
        'author_id'
    ];

    public function userBooks()
    {
        return $this->hasMany(UserBook::class, 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
