<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('categories.view', ['category'=> $category]);
    }
    public function show(Category $category)
    {
        // dd($category->id);
        // Find the category by ID
        $categoryInfo = Product::where('category_id', '=', $category->id)->get();

        // dd($categoryInfo);
        
        return view('categories.products', ['category'=> $categoryInfo]);
    }
}
