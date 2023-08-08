@extends('layouts.app')

@section('content')
    <div class="product-container">
        <img src="{{ $product->image }}" alt="Product Image">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
        <div class="buttons">
            <button class="add-to-cart-btn">Add to Cart</button>
            <button class="buy-now-btn">Buy Now</button>
        </div>
    </div>
    
@endsection