<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // For image recive by from
        $image = $request->file('blog_img');
        $imageName = $image->getClientOriginalName();
        $directory = 'blog-image/';
        $image->move($directory, $imageName);

        //For blog save on database
        $blogs = new Blog();
        $blogs->category_id = $request->category_id;
        $blogs->blog_title = $request->blog_title;
        $blogs->blog_short_desc = $request->blog_short_desc;
        $blogs->blog_long_desc = $request->blog_long_desc;
        $blogs->blog_image = $directory . $imageName;
        $blogs->publication_status = $request->publication_status;
        $blogs->save();

        return redirect('/blog/add-blog')->with('message', 'Blog save successfully');
    }

    public function manageBlog()                //Blog Show
    {
        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->get();
        return view('admin.blog.manageBlog', [
            'blogs' => $blogs
        ]);
    }

    public function editBlog($id)              //Blog edit
    {
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.editBlog', [
            'categories' => $categories,
            'blog'  => Blog::find($id)
        ]);
    }

    public function updateBlog($id)
    {
    }
}
