<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory() //add category page
    {
        return view('admin.category.addCategory');
    }

    public function newCategory(Request $request)
    {
        // $category = new Category();
        // $category->category_name         = $request->category_name;
        // $category->category_description  = $request->category_description;
        // $category->publication_status    = $request->publication_status;
        // $category->save();
        Category::create($request->all());
        return redirect('/category/add-category')->with('message', 'Category insert Successfully');
    }
}
