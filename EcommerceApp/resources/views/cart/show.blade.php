@extends('layouts.app')

@section('content')

{{-- Flash Messages --}}
    @if(Session::has('empty-cart'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('empty-cart') }}</p>
    @endif

   

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
                            <form action="{{ route('cart.remove', ['product' => $item]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="remove-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        Total Amount
                    </th>
                    {{-- // summation units*price --}}
                    <td>{{ $totalAmount }}</td>
                </tr>
            </tfoot>
        </table>
        <div class="checkout-container">
            <form action="{{ route('order.insert', ['totalAmount'=>$totalAmount]) }}" method="post">
                @csrf
                @method('post')
                <input type="submit" value="Checkout">
            </form>
            {{-- <a href="{{ route('order.placement') }}" class="checkout-btn">Checkout</a> --}}
        </div>
    </div>

@endsection