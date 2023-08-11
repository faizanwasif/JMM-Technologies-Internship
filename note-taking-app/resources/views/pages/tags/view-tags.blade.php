@extends('layouts.app')
@section('content')

<div class="view-tags-page">
    <div class="add-notes-and-view-tags-container">
        <div class="search-bar">
            <form action="http://127.0.0.1:8000/note/search" method="get"><input type="hidden" name="_token" value="S1lDPUNxt4ybPcWMyVPee3pR9esezoeDzd59ifzv"> <input type="search" name="search-notes" id="search-notes" placeholder="Search..."><button type="submit">Search</button></form>
        </div>
        
        <a href="{{ route('home') }}" class="action-button">View Notes</a>
        <a href="{{ route('create-tags') }}" class="action-button">Create Tag</a>
    </div>

    {{-- Display "not found" message if it exists --}}
    @if (session('not_found'))
        <div class="not-found-message">
            {{ session('not_found') }}
        </div>
    @endif

    {{-- Tags displaying div --}}
    <div class="notes-displaying-container">
        @foreach ($tags as $tag)
            <div class="note-container">
                <p>{{ $tag->name }}</p>
                <div class="note-actions">
                    <form action="{{ route('tag.remove', ['tag' => $tag]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="action-button">Delete</button>
                    </form>
                    <a href="{{ route('tag.edit', ['tag' => $tag]) }}" class="action-button">
                        Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
