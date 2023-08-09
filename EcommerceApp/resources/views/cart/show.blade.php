@extends('layouts.app')

@section('content')

    <div class="cart-container">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Units</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            <img src="{{ $item->image }}" alt="{{ $item->name }}" width="100" height="100">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->units }}</td>
                        <td>
                            <form action="{{ route('cart.remove', ['product' => $item->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="checkout-container">
            <a href="" class="checkout-btn">Checkout</a>
        </div>
    </div>

@endsection