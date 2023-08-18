@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-900">
    <div class="w-2/5 p-8 bg-gray-800 rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('contact-list') }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('contact-edit', ['contact'=>$contact]) }}" class="text-gray-500 hover:text-blue-500">
                    <img src="/assets/edit.png" alt="" width="20" height="20">
                </a>
                <form action="{{ route('contact-remove', ['contact'=>$contact]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-gray-500 hover:text-red-500 focus:outline-none">
                        <img src="/assets/remove.png" alt="" width="20" height="20">
                    </button>
                </form>
            </div>
        </div>
        <div class="flex items-center justify-center mb-6">
            <img src="../../storage/images/{{ $contact->image }}" alt="person" class="w-24 h-24 rounded-full object-cover">
        </div>
        <h1 class="text-2xl font-semibold mb-1">{{ $contact->name }}</h1>
        <p class="text-gray-500 text-sm mb-4">{{ $contact->company }}</p>
        <p class="text-gray-600 text-sm">Email: {{ $contact->email }}</p>
        <p class="text-gray-600 text-sm">Phone: {{ $contact->phone }}</p>
        @if ($contact->tag != null)
            <p class="text-gray-600 text-sm">Tag: {{ $contact->tag->name }}</p>
        @endif
        <hr class="my-4">
        <h2 class="text-xl font-semibold mb-2">History</h2>
        <div class="h-64 overflow-y-auto">
            @if ($activities->count() > 0)
                @foreach ($activities as $history)
                    <div class="py-2">
                        <p class="text-gray-600">{{ $history->activity }}</p>
                        <button class="text-red-500 hover:text-red-700 text-xs focus:outline-none mt-1" onclick="deleteHistory({{ $history->id }})">
                            Delete
                        </button>
                    </div>
                @endforeach
            @else
                <div class="text-gray-500 text-sm">No History to show</div>
            @endif
        </div>
    </div>
</div>

<script>
    function deleteHistory(historyId) {
        // Implement the logic to delete history here
        // You can use AJAX to send a DELETE request to the server
    }
</script>
@endsection
