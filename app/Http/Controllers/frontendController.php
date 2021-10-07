<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('publication_status', 1)->get();            //frontend blog show
        $category = Category::where('publication_status', 1)->get();        //menu show from category
        $logo = Logo::latest('id')->first();
        return view('frontEnd.home.index', [
            'blogs' => $blogs,
            'categorys' =>   $category,
            'logo'  =>     $logo
            // compact('blogs', 'category', 'logo')
        ]);
    }

    public function categoryBlog($id)
    {
        return view('frontEnd.home.categoryPost', [
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blogs' => Blog::where('category_id', $id)->where('publication_status', 1)->get(), //category post on menu
            'logo' => Logo::latest('id')->first()   //For logo, table last row count
        ]);
    }

    public function blogDetails($id)
    {           //blog details
        $findBlog = Blog::find($id);
        return view('frontEnd.home.blogDetails', [
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blog'     =>  Blog::find($id),
            'logo' => Logo::latest('id')->first()
        ]);
    }

    public function logoSetting()
    {          //Logo setting
        return view('admin.frontEndSetting.logoSetting');
    }

    public function logoSave(Request $request)
    {
        // For image recive by from
        $logo = $request->file('logo_image');
        $logoName = rand(0, 999999999) . $logo->getClientOriginalName();
        $directory = 'logo-image/';
        $logo->move($directory, $logoName);

        //For logo save on database
        $logoSave = new logo();
        $logoSave->logo_title       =   $request->logo_title;
        $logoSave->logo_image       =   $logoName;
        $logoSave->save();
        return redirect('logo-setting')->with('message', 'Logo save successfuly');
    }

    public function headerPage()
    {             //show add header page
        return view('admin.header.header', [
            'categories' =>   Category::where('publication_status', 1)->get(),
        ]);
    }

    public function newHeader(Request $request)
    {              //create new header page
        $header_image = $request->file('header_image');
        $image_name = $header_image->getClientOriginalName();
        $image_directory = 'header-image/';
        $header_image->move($image_directory, $image_name);

        $header_info = new Header();
        $header_info->header_title       = $request->header_title;
        $header_info->header_content     = $request->header_content;
        $header_info->header_image       = $request->$image_directory . $image_name;
        $header_info->publication_status       = $request->publication_status;
        $header_info->save();
    }
}
