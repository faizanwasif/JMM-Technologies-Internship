@extends('layouts.app')

@section('content')
    {{-- <h2>Category: {{ $category }}</h2> --}}

    <div class='catalogue'>
        @foreach ($category as $item)
            <div class='product-display'>
                <figure>
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" width="200" height="200">
                    <figcaption>{{ $item->name }}</figcaption>
                    <p>{{ $item->description }}</p>
            
                    <br>
                    <a href="{{ route('product.show', ['product'=>$item]) }}">View Product</a>
                </figure>
            </div>
        @endforeach
    </div>

@endsection