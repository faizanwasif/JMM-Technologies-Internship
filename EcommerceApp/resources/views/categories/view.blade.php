@extends('layouts.app')

@section('content')
    <ul class="category-list">
        @foreach ($category as $cat)
            <a href="{{ route('category.show' , ['category'=>$cat]) }}" style="text-decoration: none; color:black">
                <li class="category-item">{{ $cat-> name }}</li>
            </a>
        @endforeach
    </ul>

@endsection
