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
        <h1 class="text-2xl font-bold mb-6">Create Contact</h1>
        <a href="{{ route('contact-list') }}">Back</a>
        <form action="{{ route('contact-store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-5 rounded shadow-md">
            @csrf
            @method('POST')
            
            <div class="mb-4">
                <label for="name" class="block text-white font-semibold mb-1">Name:</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-white font-semibold mb-1">Email:</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300" required>
            </div>
            
            <div class="mb-4">
                <label for="company" class="block text-white font-semibold mb-1">Company:</label>
                <input type="text" id="company" name="company" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300">
            </div>
            
            <div class="mb-4">
                <label for="phone" class="block text-white font-semibold mb-1">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300">
            </div>
            
            <div class="mb-4">
                <label for="image" class="block text-white font-semibold mb-1">Image:</label>
                <input type="file" id="image" name="image" class="w-full bg-gray-700 text-white p-1 rounded focus:outline-none focus:bg-gray-900 transition duration-300">
            </div>
            
            <div class="mb-4">
                <label for="tag" class="block text-white font-semibold mb-1">Tag:</label>
                <select id="tag" name="tag_id" class="w-full px-3 py-2 rounded bg-gray-700 text-white focus:outline-none focus:bg-gray-900 transition duration-300">
                    <option value="">None</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm transition duration-300">Create Contact</button>
            </div>
        </form>
    </div>

@endsection