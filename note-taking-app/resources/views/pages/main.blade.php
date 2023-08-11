@extends('layouts.app')
@section('content')

    
    {{-- // new note and category buttons div --}}
    <div class="add-notes-and-view-tags-container">
        <div class="search-bar">
            <input type="search" name="search-notes" id="search-notes" placeholder="Search...">
        </div>
        <a href="{{ route('create-notes') }}">Note +</a>
        <a href="{{ route('view-tags') }}">Tag +</a>
    </div>

    {{-- // notes displaying div --}}
        
        @foreach ($notes as $note)

            <div class="notes-displaying-container">
                <div class="note-container">
                    {{-- <figure>
                        <img src="/assets/edit.png" alt="edit">
                    </figure> --}}
                    <p>{{ $note->title }}</p>
                </div>
                <div >
                    <form action="" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                    
                    <a href="" class="note-delete-btn">Edit</a>
                </div>

            </div>
            
        @endforeach


@endsection