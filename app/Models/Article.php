<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'url',
        'title',
        'content',
        'meta_tag_title',
        'meta_tag_description',
        'category',
        'published_date'
    ];

    protected $dates = ['published_at'];
}
