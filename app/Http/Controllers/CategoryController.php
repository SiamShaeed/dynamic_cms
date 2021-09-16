<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory()                     //add category page
    {
        return view('admin.category.addCategory');
    }

    public function newCategory(Request $request)    //New category create
    {
        Category::saveCategoryInfo($request);        //link Category model
        return redirect('/category/add-category')->with('message', 'Category insert Successfully');
    }

    public function manageCategory()                //Show category
    {
        $categories = Category::all();
        return view('admin.category.manageCategory', [
            'categories' => $categories
        ]);
    }

    public function editCategory($id)                    //Edit Category
    {
        $categories = Category::find($id);
        return view('admin.category.editCategory', [
            'categories' => $categories
        ]);
    }
}
