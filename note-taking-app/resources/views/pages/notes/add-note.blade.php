@extends('layouts.app')
@section('content')

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                <textarea id="content" name="content" rows="8" ></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="create-note-btn">Create Note</button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Notes Buddy</p>
    </footer>
</div>

@endsection

@push('scripts')
    <script>
        // Your additional script content here
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Hello from DOMContentLoaded");
            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush
