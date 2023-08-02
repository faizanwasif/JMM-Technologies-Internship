@extends('layouts.layout')

@section('content')
    <h1>Edit Record</h1>


    <form method="post" action="{{ route('category.update' , ['category' => $category]) }}">

        @csrf
        @method('put')

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $category->name }}">
        
        <br><br>
        
        <label for="desc">Description</label>
        <input type="text" name="desc" value="{{ $category->desc }}">
        
        
        <br><br>
        
        <input type="submit" value="Update book">
        
    </form>

@endsection