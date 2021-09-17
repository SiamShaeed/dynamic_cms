<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogController()
    {
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.addBlog', [
            'categories' => $categories
        ]);
    }
}
