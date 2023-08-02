<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;



class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view("post.show", [
            'posts' => $posts,
        ]);
        
    }

    public function create(){
        $catInfo = Category::all();

        // Pass the "category" variable to the view
        return view('post.create', ['catInfo' => $catInfo]);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'pubdate' => 'required',
            'cat_id' => 'required',
        ]);
    
        $addNewPost = Post::create($data);
    
        return redirect(route('post.show'));
    }
    

    public function edit(Post $post){

        $postInfo = DB::table('posts')
        ->join('categories', 'posts.cat_id', '=', 'categories.id')
        ->select('posts.*','categories.*')
        ->get();
        return view('post.edit', ['post'=> $post, 'postInfo' => $postInfo]);
        
    }

    public function update(Post $post, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // update data in db
        $post -> update($data);
        return redirect(route('post.add'))->with('success', 'post updated succesfully!');
    }

    public function destroy(Post $post){

        $post -> delete();
        
        return redirect(route('post.show'))->with('success', 'Book deleted succesfully!');
    
    }
}
