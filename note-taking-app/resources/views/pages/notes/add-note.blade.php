@extends('layouts.app')
@section('content')

    <header>
        <h1>Create a New Note</h1>
    </header>
    <div class="create-note-container">
        <form action="#" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="tag">Tag:</label>
            <select name="tag" id="">
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