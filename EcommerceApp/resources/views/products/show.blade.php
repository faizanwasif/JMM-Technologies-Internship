@extends('layouts.app')

@section('content')
    <div class="product-container">
        <img src="{{ $product->image }}" alt="Product Image">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
        <div class="buttons">
            <button class="add-to-cart-btn">Add to Cart</button>
            <a href="{{ route('order.placement') }}">Buy Now</a>
        </div>
    </div>
    
@endsection