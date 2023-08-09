@extends('layouts.app')

@section('content')
    <div class="product-container">
        <img src="{{ $product->image }}" alt="Product Image">
        <h3>Product Name: {{ $product->name }}</h3>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <div class="buttons">
            <button class="add-to-cart-btn">Add to Cart</button>
        </div>
    </div>
    
@endsection