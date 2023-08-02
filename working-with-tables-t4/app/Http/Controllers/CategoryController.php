<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;



class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view("category.show", [
            'categories' => $categories,
        ]);
        
    }

    public function create(){
        return view('category.create');
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);

        $addNewCat = Category::create($data);

        return redirect(route('category.show'));
    }

    public function edit(Category $category){
        return view('category.edit', ['category'=> $category]);
    }

    public function update(Category $category, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);

        // update data in db
        $category -> update($data);
        return redirect(route('category.add'))->with('success', 'Category updated succesfully!');
    }

    public function destroy(Category $category)
    {
        // Get all posts belonging to the category
        $posts = Post::where('cat_id', $category->id)->get();

        // Delete each post one by one
        foreach ($posts as $post) {
            $post->delete();
        }

        // Now you can delete the category
        $category->delete();

        return redirect(route('post.show'))->with('success', 'Category deleted successfully!');
    }
}
