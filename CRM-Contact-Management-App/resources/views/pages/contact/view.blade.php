@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="bg-gray-800 p-16 rounded-lg shadow-md text-center">
        <div class="mb-8">
            <img src="../../storage/images/{{ $contact->image }}" alt="person" class="rounded-full h-28 w-28 object-cover mx-auto mb-4">
            <div>
                <h1 class="text-4xl font-semibold">{{ $contact->name }}</h1>
                <p class="text-gray-500 text-xl font-semibold">{{ $contact->company }}</p>
            </div>
        </div>
        <div class="mb-16">
            <p class="text-gray-100 text-xl">Email: {{ $contact->email }}</p>
            <p class="text-gray-100 text-xl">Phone: {{ $contact->phone }}</p>
            <p class="text-gray-100 text-xl">Tag: {{ $contact->tag->name }}</p>
        </div>
        <div class="flex justify-center">
            <a href="" class="bg-blue-500 hover:bg-blue-600 text-white py-2.5 px-12 rounded-full text-lg transition duration-300 mr-8">Edit</a>
            <form action="" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2.5 px-12 rounded-full text-lg transition duration-300">Delete</button>
            </form>
        </div>
    </div>
</div>



@endsection
