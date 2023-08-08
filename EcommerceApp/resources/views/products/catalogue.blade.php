@extends('layouts.app')

@section('content')

    <nav>
        <a href="{{ route('cart.show') }}">Cart</a>
    </nav>
    @if ($errors->any())
        <div  style="color: red;">
            <ul>
                @foreach ($errors->all() as  $error)
                    <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class='catalogue'>
        @foreach ($product as $item)
            <div class='product-display'>
                <figure>
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" width="200" height="200">
                    <figcaption>{{ $item->name }}</figcaption>
                    <p>{{ $item->description }}</p>
                    
                    <form action="{{ route('cart.add', ['user_id'=>$user_id, 'product_id' => $item->id]) }}" method="post">
                        @csrf
                        @method('post')
                        <input type="submit" value="Add to Cart">
                    </form>
                </figure>
            </div>
        @endforeach
    </div>

@endsection
