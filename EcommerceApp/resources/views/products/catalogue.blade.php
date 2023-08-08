@extends('layouts.app')

@section('content')

    <div class='catalogue'>
        @foreach ($product as $item)
            <div class='product-display'>
                <figure>
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" width="200" height="200">
                    <figcaption>{{ $item->name }}</figcaption>
                    <p>{{ $item->description }}</p>
                    <a href="{{ route('product.show', ['product' => $item]) }}">Buy Now</a>
                </figure>
            </div>
        @endforeach
    </div>

@endsection
