<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('publication_status', 1)->get();   //frontend blog show
        $category = Category::where('publication_status', 1)->get();   //menu show from category
        return view('frontEnd.home.index', [
            'blogs' => $blogs,
            'categorys' =>   $category
        ]);
    }

    public function categoryBlog($id){
        return view('frontEnd.home.categoryPost',[
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blogs' => Blog::where('category_id', $id)->where('publication_status', 1)->get() //category post on menu
        ]);
    }

    public function blogDetails($id){   //blog details
        $findBlog = Blog::find($id);
        return view('frontEnd.home.blogDetails',[
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blog'     =>  Blog::find($id)
        ]);
    }
}
