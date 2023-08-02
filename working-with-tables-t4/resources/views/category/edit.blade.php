@extends('layouts.layout')

@section('content')
    <h1>Edit Record</h1>

    <form method="post" action="{{ route('category.update' , ['category' => $category]) }}" class="insertion">

        @csrf
        @method('put')

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $category->name }}">
        
        <br><br>
        
        <label for="desc">Description</label>
        <input type="text" name="desc" value="{{ $category->desc }}">
        
        
        <br><br>
        
        <input type="submit" value="Update Category">
        
    </form>
    <form action="{{ route('category.show') }}" style='text-align: center; margin-top: 20px;' >
        <button type='submit'class="addBtn">Show Categories</button>
    </form>

@endsection