@extends('layouts.layout')

@section('content')
    <div style="text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px;">
        <h1>Add record</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    
        <form method="post" action="{{ route('post.add') }}" style="display: inline-block; text-align: left; width: 300px;">
    
            @csrf
            @method('post')
    
            <label for="title" style="display: block; font-weight: bold;">Title</label>
            <input type="text" name="title" style="display: block; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <label for="content" style="display: block; font-weight: bold;">Content</label>
            <input type="text" name="content" style="display: block; hieght:40px; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <label for="pubdate" style="display: block; font-weight: bold;">Publication Date</label>
            <input type="string" name="pubdate">
            
            <select name="cat_id" id="cat_id">
                @foreach ($catInfo as $cat)
                    <option value="{{ $cat->id}}">{{ $cat->name }}</option>
                @endforeach
            </select>
            
            <br><br>
            <input type="submit" value="Add Blog" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;">
    
        </form>
    </div>
@endsection