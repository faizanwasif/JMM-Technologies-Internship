@extends('layouts.app')

@section('content')
    <ul class="category-list">
        @foreach ($category as $cat)
            <a href="{{ route('category.show' , ['category'=>$cat]) }}">
                <li class="category-item">{{ $cat }}</li>
            </a>
        @endforeach
    </ul>

@endsection
