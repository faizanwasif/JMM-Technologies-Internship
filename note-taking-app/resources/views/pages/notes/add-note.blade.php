@extends('layouts.app')
@section('content')

<div class="add-note-page">
    <header>
        <h1>Create a New Note</h1>
        <a href="{{ route('home') }}">Back</a>
    </header>
    <div class="create-note-container">
        <form action="{{ route('add-notes') }}" method="POST">
            @csrf
            @method('post')
            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="tag">Tag:</label>
                <select name="tag_id" id="tag_id">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="8" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="create-note-btn">Create Note</button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Your App Name</p>
    </footer>
</div>

@endsection
