@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-10">Tags</h1>

        {{-- Search --}}
        <div class="mb-4 flex">
            <form action="{{ route('tag-search') }}" method="get" class="flex items-center">
                @csrf
                @method('get')
                
                <input type="text" name="search-tag" placeholder="Search contacts..." class="px-4 py-2 rounded-l border border-gray-300 text-black focus:outline-none focus:border-blue-500 transition duration-300">
                <button type="submit" class="px-3 py-1.5 bg-blue-500  rounded-r border border-blue hover:bg-blue-600"><img src="/assets/search.svg" alt="search"></button>
        
            </form>
        
            <a href="{{ route('add-tags') }}" class="ml-auto action-button"><img src="/assets/add-48-2.png" alt="add" style="width: 34px; height: 34px"></a>
        </div>
        

        {{-- Display "not found" message if it exists --}}
        @if (session('not_found'))
            <div class="not-found-message bg-red-200 text-red-800 p-4 rounded mt-4">
                {{ session('not_found') }}
            </div>
        @else
            {{-- Display tags if they exist --}}
            <div class="grid grid-cols-1 gap-8">
                @foreach ($tags as $tag)
                <div class="bg-gray-800 p-5 rounded shadow-md flex items-center">
                    <div class="ml-4">
                        <p class="text-xl font-semibold">{{ $tag->name }}</p>
                        <p class="text-gray-400">{{ $tag->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('tag-edit', ['tag'=>$tag]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-5 rounded-full text-sm transition duration-300">Edit</a>
                        <form action="{{ route('tag-remove', ['tag'=>$tag]) }}" method="post" class="inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-3 px-5 rounded-full text-sm transition duration-300 ml-2">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        <div class="mt-4">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
