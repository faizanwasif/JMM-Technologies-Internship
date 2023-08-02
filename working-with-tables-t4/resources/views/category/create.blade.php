@extends('layouts.layout')

@section('content')
    <div style="text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px;">
        <h1>Add record</h1>
    
        <form method="post" action="{{ route('category.add') }}" class="insertion">
    
            @csrf
            @method('post')
    
            <label for="title">Name</label>
            <input type="text" name="name">
            <br>
            <label for="author" >Description</label>
            <input type="text" name="desc" >
            <br>
            
            <input type="submit" value="Add Category" >

        </form>
        <form action="{{ route('category.show') }}" style='text-align: center; margin-top: 20px;'>
            <button type='submit' style='height:50px; width: 100%; max-width: 200px; background-color: #0727f4; color: white; border: none; cursor: pointer;'>Show Categories</button>
        </form>
    </div>
@endsection