@extends('layouts.layout')

@section('content')
    <h1>Edit Record</h1>

    @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    <form method="post" action="{{ route('post.update' , ['post' => $post, 'postInfo' => $postInfo]) }}" class="insertion">

        @csrf
        @method('put')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
        
        <br><br>
        
        <label for="content">Content</label>
        <input type="text" name="content" value="{{ $post->content }}">

        <br><br>

        <label for="pubdate">Publication Date</label>
        <input type="date" name="pubyear" value="{{ $post->pubdate}}">        
        
        <br><br>

        <label for="categories">Categories</label>

        <select name="categories" id="categories">
            @foreach ($postInfo as $cat)
                <option value="{{ $cat->id}}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Update post">
        
    </form>
    <form action="{{ route('post.show') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' class="addBtn">Show Posts</button>
    </form>

@endsection