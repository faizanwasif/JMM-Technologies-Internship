@extends('layouts.app')
@section('content')

    <header>
        <h1>Create a New Tag</h1>
        <a href="{{ route('view-tags') }}">Back</a>
    </header>
    <div class="create-note-container">
        <form action="{{ route('tag.update', ['tag' => $tag]) }}" method="POST">

            @csrf
            @method('put')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $tag->name }}">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"  rows="8">{{ $tag->description }}</textarea>

            
            
            <button type="submit">Update Tag</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Your App Name</p>
    </footer>

@endsection