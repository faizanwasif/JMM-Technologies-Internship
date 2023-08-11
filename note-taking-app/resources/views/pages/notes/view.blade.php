@extends('layouts.app')
@section('content')

<div class="view-note-container">
    <div class="note-header">
        <h1>{{ $note->title }}</h1>
        <a href="{{ route('note.edit', ['note' => $note]) }}" class="edit-button">
            <img src="/assets/edit.png" alt="Edit" width="20" height="20">
        </a>
    </div>
    <p class="note-content">{{ $note->content }}</p>
    <div class="note-actions">
        <a href="{{ route('home') }}" class="action-button">Back to Notes</a>
    </div>
</div>

@endsection
