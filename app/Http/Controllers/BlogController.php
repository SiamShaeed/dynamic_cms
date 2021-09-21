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
        $blogs->category_id         = $request->category_id;
        $blogs->blog_title          = $request->blog_title;
        $blogs->blog_short_desc     = $request->blog_short_desc;
        $blogs->blog_long_desc      = $request->blog_long_desc;
        $blogs->blog_image          = $directory . $imageName;
        $blogs->publication_status  = $request->publication_status;
        $blogs->save();

        return redirect('/blog/add-blog')->with('message', 'Blog save successfully');
    }

    public function manageBlog()                //Blog Show
    {
        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->orderBy('blogs.id', 'desc')
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

    public function updateBlog(Request $request)    //Blog update
    {
        $blogimage = $request->file('blog_img');
        $blog = Blog::find($request->id);
        if ($blogimage) {
            // delete image
            unlink($blog->blog_image);
            // set image save directions
            $imageName = $blogimage->getClientOriginalName();
            $directory = 'blog-image/';
            $blogimage->move($directory, $imageName);
            // image save database
            $blog->category_id        = $request->category_id;
            $blog->blog_title         = $request->blog_title;
            $blog->blog_short_desc    = $request->blog_short_desc;
            $blog->blog_long_desc     = $request->blog_long_desc;
            $blog->blog_image         = $directory . $imageName;
            $blog->publication_status = $request->publication_status;
            $blog->save();
            return redirect('blog/manage-blog')->with('message', 'Blog Update Successfully');
        } else {
            $blog->category_id        = $request->category_id;
            $blog->blog_title         = $request->blog_title;
            $blog->blog_short_desc    = $request->blog_short_desc;
            $blog->blog_long_desc     = $request->blog_long_desc;
            $blog->publication_status = $request->publication_status;
            $blog->save();
            return redirect('blog/manage-blog')->with('message', 'Blog Update Successfully');
        }
    }

    public function deleteBlog(Request $request)           //Delete Blog
    {
        $blog = Blog::find($request->id);
        unlink($blog->blog_image);  //delete image
        $blog->delete();
        return redirect('/blog/manage-blog')->with('message', 'Blog delete successfully');
    }
}
