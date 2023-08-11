@extends('layouts.app')
@section('content')

<div class="add-tags-page">
    <header>
        <h1>Create a New Tag</h1>
        <a href="{{ route('view-tags') }}" class="back-link">Back</a>
    </header>
    <div class="create-tag-container">
        <form action="{{ route('add-tags') }}" method="POST">
            @csrf
            @method('post')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="6"></textarea>

            <button type="submit" class="create-tag-btn">Create Tag</button>
        </form>
    </div>
</div>
<footer>
    <p>&copy; 2023 Your App Name</p>
</footer>

@endsection
