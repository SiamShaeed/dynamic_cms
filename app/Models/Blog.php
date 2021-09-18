<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'blog_title', 'blog_short_desc', 'blog_long_desc', 'blog_image', 'publication_status'];
}
