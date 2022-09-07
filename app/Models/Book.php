<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'gender_id',
        'title',
        'author',
        'description',
        'imageUrl',
        'reserved'
    ];
    protected $hidden = [
        'reserved',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
