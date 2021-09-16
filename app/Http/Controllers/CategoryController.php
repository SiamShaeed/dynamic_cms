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
        Category::saveCategoryInfo($request);       //link Category model
        return redirect('/category/add-category')->with('message', 'Category insert Successfully');
    }

    public function manageCategory() //Show category
    {
        $categories = Category::all();
        return view('admin.category.manageCategory', [
            'categories' => $categories
        ]);
    }
}
