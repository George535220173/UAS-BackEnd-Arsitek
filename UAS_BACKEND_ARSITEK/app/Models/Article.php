<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'article_title',
        'article_author',
        'thumbnail',
        'article_link',
    ];    
}
