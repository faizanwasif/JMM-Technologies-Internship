@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-10">Add Tag</h1>
        <form action="" method="post" class="w-1/2">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Tag name" class="bg-gray-800 text-white border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Tag</button>
            </div>
        </form>
    </div>
    
@endsection