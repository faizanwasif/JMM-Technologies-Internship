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
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Edit Tag</h1>
        <a href="{{ route('view-tags') }}">Back</a>
        <form action="{{ route('tag-update', ['tag' => $tag]) }}" method="POST" class="bg-gray-800 p-5 rounded shadow-md">
            @csrf
            @method('put')
            
            <div class="mb-4">
                <label for="name" class="block text-white font-semibold mb-1">Tag Name:</label>
                <input type="text" value="{{ $tag->name }}" id="name" name="name" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300" required>
            </div>
            
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm transition duration-300">Edit Tag</button>
            </div>
        </form>
    </div>
@endsection
