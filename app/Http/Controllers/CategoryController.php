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

    public function newCategory(Request $request)       //New category create
    {
        Category::saveCategoryInfo($request);           //link Category model
        return redirect('/category/add-category')->with('message', 'Category insert Successfully');
    }

    public function manageCategory()                    //Show category
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

    public function updateCategory(Request $request)      //Data Update
    {
        $categories = Category::find($request->id);        //match database id with input field id
        $categories->category_name = $request->category_name;
        $categories->category_description = $request->category_description;
        $categories->publication_status = $request->publication_status;
        $categories->save();

        return redirect('/category/manage-category')->with('message', 'Category update successfully');
    }

    public function daleteCategory(Request $request)                 //Category delete
    {
        $categories = Category::find($request->id);
        $categories->delete();
        return redirect('/category/manage-category')->with('message', 'Category delete successfully');
    }
}
