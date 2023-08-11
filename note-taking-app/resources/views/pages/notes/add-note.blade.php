@extends('layouts.app')
@section('content')

    <header>
        <h1>Create a New Note</h1>
        <a href="{{ route('home') }}">Back</a>
    </header>
    <div class="create-note-container">
        <form action="{{ route('add-notes') }}" method="POST">

            @csrf
            @method('post')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="tag">Tag:</label>
            <select name="tag_id" id="tag_id">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="8" required></textarea>

            
            
            <button type="submit">Create Note</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Your App Name</p>
    </footer>

@endsection