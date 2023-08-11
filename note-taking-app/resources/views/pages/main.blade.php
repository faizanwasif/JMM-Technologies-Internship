@extends('layouts.app')
@section('content')

<div class="main-container">
    <div class="add-notes-and-view-tags-container">
        <div class="search-bar">
            <input type="search" name="search-notes" id="search-notes" placeholder="Search...">
        </div>
        <a href="{{ route('create-notes') }}" class="action-button">Create Note</a>
        <a href="{{ route('view-tags') }}" class="action-button">View Tags</a>
    </div>

    <div class="notes-list-container">
        @foreach ($notes as $note)
            <div class="note-container">
                <div class="note-preview">
                    <p class="note-title">{{ $note->title }}</p>
                    <p class="note-content">{{ substr($note->content, 0, 100) }}...</p>
                </div>
                <div class="note-actions">
                    <a href="{{ route('note.view', ['note'=>$note]) }}" class="action-button view-button">View Note</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
