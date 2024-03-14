<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'description', 'isbn', 'publisher', 'gender', 'year', 'created_at', 'updated_at', 'created_by', 'updated_by', 'author_id'
    ];

}
