<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('publication_status', 1)->get();   //frontend blog show
        return view('frontEnd.home.index', [
            'blogs' => $blogs
        ]);
    }
}
