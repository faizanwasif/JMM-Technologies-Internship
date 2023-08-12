@extends('layouts.app')
@section('content')

<div class="edit-note-container">
    <header>
        <h1>Edit Note</h1>
        <a href="{{ route('home') }}">Back</a>
    </header>
    <div class="create-note-form">
        <form action="{{ route('note.update', ['note' => $note]) }}" method="POST">
            @csrf
            @method('put')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}">

            <label for="tag">Tag:</label>
            <select name="tag_id" id="tag_id">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $tag->id === $note->tag_id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="8" required>{{ $note->content }}</textarea>
            
            <button type="submit">Update Note</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Notes Buddy</p>    </footer>
</div>

@endsection

@push('scripts')
    <script>
        // Your additional script content here
        document.addEventListener("DOMContentLoaded", function() {
            
            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush

