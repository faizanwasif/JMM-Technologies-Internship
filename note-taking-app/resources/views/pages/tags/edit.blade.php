@extends('layouts.app')
@section('content')

<div class="edit-tag-container">
    <header>
        <h1>Edit Tag</h1>
        <a href="{{ route('view-tags') }}" class="back-link">Back</a>
    </header>

    <div class="tag-form-container">
        <form action="{{ route('tag.update', ['tag' => $tag]) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $tag->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="6" class="form-control">{{ $tag->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Tag</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2023 Notes Buddy</p></footer>

@endsection

@push('scripts')
    <script>
        // Your additional script content here
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Hello from DOMContentLoaded");
            ClassicEditor
                .create( document.querySelector( '#description' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush