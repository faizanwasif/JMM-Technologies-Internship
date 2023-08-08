@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div  style="color: red;">
            <ul>
                @foreach ($errors->all() as  $error)
                    <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach ($items as $item)
    <div class='product-display'>
        <figure>
            <img src="{{ $item->image }}" alt="{{ $item->name }}" width="200" height="200">
            <figcaption>{{ $item->name }}</figcaption>
            <p>{{ $item->description }}</p>
            <a href="{{ route('product.show', ['product' => $item]) }}">Buy Now</a>
        </figure>
    </div>
@endforeach>
    
@endsection