<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('publication_status', 1)->get();   //frontend blog show
        $category = Category::where('publication_status', 1)->get();   //menu show from category
        $logo = Logo::latest('id')->first();
        return view('frontEnd.home.index',[
            'blogs' => $blogs,
            'categorys' =>   $category,
            'logo'  =>     $logo
            // compact('blogs', 'category', 'logo')
        ]);

    }

    public function categoryBlog($id){
        return view('frontEnd.home.categoryPost',[
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blogs' => Blog::where('category_id', $id)->where('publication_status', 1)->get(), //category post on menu
            'logo' => Logo::latest('id')->first()   //For logo, table last row count
        ]);
    }

    public function blogDetails($id){   //blog details
        $findBlog = Blog::find($id);
        return view('frontEnd.home.blogDetails',[
            'categorys' =>   Category::where('publication_status', 1)->get(),
            'blog'     =>  Blog::find($id),
            'logo' => Logo::latest('id')->first()
        ]);
    }

    public function logoSetting(){  //Logo setting
        return view('admin.frontEndSetting.logoSetting');
    }

    public function logoSave(Request $request){
        // For image recive by from
        $logo = $request->file('logo_image');
        $logoName = rand(0, 999999999).$logo->getClientOriginalName();
        $directory = 'logo-image/';
        $logo->move($directory, $logoName);

        //For logo save on database
        $logoSave = new logo();
        $logoSave->logo_title       =   $request->logo_title;
        $logoSave->logo_image       =   $logoName;
        $logoSave->save();
        return redirect('logo-setting')->with('message', 'Logo save successfuly');
    }
}
