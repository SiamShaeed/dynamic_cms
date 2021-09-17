<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog()       //Show add blog page
    {
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.addBlog', [
            'categories' => $categories
        ]);
    }

    public function newBlog(Request $request)       //Blog save on database
    {
        $blogs = new Blog();
        $blogs->category_name = $request->category_name;
        $blogs->blog_title = $request->blog_title;
        $blogs->blog_short_desc = $request->blog_short_desc;
        $blogs->blog_long_desc = $request->blog_long_desc;
        $blogs->publication_status = $request->publication_status;
        $blogs->save();
    }
}
