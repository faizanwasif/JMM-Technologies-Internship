@extends('layouts.app')

@section('content')
<a href="{{ route('contact-list') }}" >
    <img src="../../assets/back.png" alt="back">
</a>
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
            @if ($contact->tag != null )
                <p class="text-gray-100 text-xl">Tag: {{ $contact->tag->name }}</p>
            @endif
            
        </div>
        <div class="flex justify-center">
            <a href="{{ route('contact-edit', ['contact'=>$contact]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2.5 px-12 rounded-full text-lg transition duration-300 mr-8">Edit</a>
            <form action="{{ route('contact-remove', ['contact'=>$contact]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2.5 px-12 rounded-full text-lg transition duration-300">Delete</button>
            </form>
        </div>
    </div>
    <div class="h-screen bg-gray-800 border m-10 mt-12 overflow-y-scroll max-h-60">
        @if (count($histories) != 0)
            @foreach ($histories as $history)
                <div class="p-4 text-left border-b">
                    <p class="text-gray-400">{{ $history->activity }}d</p>
                </div>
            @endforeach
        @else
            <p>No History to show</p>
        @endif
        
        
    </div>
    
</div>



@endsection
