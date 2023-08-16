@extends('layouts.app')

@section('content')

    <div class="container mx-auto py-10">

        <h1 class="text-2xl font-bold mb-10">Contact List</h1>

        <div class="mb-4 flex">
            <form action="" method="post" class="flex items-center">
                @csrf
                @method('post')
                
                <input type="text" placeholder="Search contacts..." class="px-4 py-2 rounded-l border border-gray-300 text-black focus:outline-none focus:border-blue-500 transition duration-300">
                <button type="submit" class="px-3 py-1.5 bg-blue-500  rounded-r border border-blue hover:bg-blue-600"><img src="/assets/search.svg" alt="search"></button>
        
            </form>
        
            <a href="{{ route('contact-create') }}" class="ml-auto action-button"><img src="/assets/add-48-2.png" alt="add" style="width: 34px; height: 34px"></a>
        </div>
        <div class="grid grid-cols-1 gap-8">
            @foreach ($contacts as $contact )
                <div class="bg-gray-800 p-5 rounded shadow-md flex items-center">
                    <img src="storage/images/{{ $contact->image }}" alt="{{ $contact->name }}" class="rounded-full h-14 w-14 object-cover">
                    <div class="ml-4">
                        <p class="text-lg font-semibold">{{ $contact->name }}</p>
                        <p class="text-gray-400">{{ $contact->phone }}</p>
                        <p class="text-gray-400">{{ $contact->company }}</p>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('contact-view', ['contact'=>$contact]) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-5 rounded-full text-sm transition duration-300">View</a>
                        <a href="#" class="bg-green-500 hover:bg-green-600 text-white py-3 px-5 rounded-full text-sm transition duration-300 ml-2">Email</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection
