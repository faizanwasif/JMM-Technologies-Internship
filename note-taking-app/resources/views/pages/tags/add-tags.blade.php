@extends('layouts.app')
@section('content')

    <header>
        <h1>Create a New Tag</h1>
        <a href="{{ route('view-tags') }}">Back</a>
    </header>
    <div class="create-note-container">
        <form action="{{ route('add-notes') }}" method="POST">

            @csrf
            @method('post')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="8"></textarea>

            
            
            <button type="submit">Create Tag</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Your App Name</p>
    </footer>

@endsection