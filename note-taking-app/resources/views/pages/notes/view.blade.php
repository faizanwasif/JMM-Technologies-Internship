@extends('layouts.app')
@section('content')

<div class="view-note-container">
    <div class="note-header">
        <h1>{{ $note->title }}</h1>
        <a href="{{ route('note.edit', ['note' => $note]) }}" class="edit-button">
            <img src="/assets/edit.png" alt="Edit" width="20" height="20">
        </a>
        <form action="{{ route('note.remove', ['note' => $note]) }}" method="post">
            @csrf
            @method('delete')
            <input type="image" src="/assets/remove.png" alt="delete" width="20" height="20">
        </form>
    </div>
    <p class="note-content">{{ strip_tags($note->content) }}</p>

    <div class="note-actions">
        <a href="{{ route('home') }}" class="action-button">Back to Notes</a>
    </div>
</div>

@endsection
