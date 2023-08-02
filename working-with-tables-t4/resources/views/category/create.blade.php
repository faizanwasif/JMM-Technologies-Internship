@extends('layouts.layout')

@section('content')
    <div style="text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px;">
        <h1>Add record</h1>
    
        <form method="post" action="{{ route('category.add') }}" style="display: inline-block; text-align: left; width: 300px;">
    
            @csrf
            @method('post')
    
            <label for="title" style="display: block; font-weight: bold;">Name</label>
            <input type="text" name="name" style="display: block; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <label for="author" style="display: block; font-weight: bold;">Description</label>
            <input type="text" name="desc" style="display: block; hieght:40px; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            
            <input type="submit" value="Add Blog" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;">
    
        </form>
    </div>
@endsection