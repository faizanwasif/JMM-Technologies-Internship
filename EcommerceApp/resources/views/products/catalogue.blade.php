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

    <h3>
        <a href="{{ route('category.view') }}">Categories</a>
    </h3>

    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert', 'alert-success') }}">
            {{ Session::get('success') }}
        </p>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 2000); // Adjust the delay time (in milliseconds) as needed
        </script>
    @endif
    
    @if(Session::has('add-success'))
        <div class="alert alert-success">
            {{ Session::get('add-success') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert-success').style.display = 'none';
            }, 2000); // Adjust the delay time (in milliseconds) as needed
        </script>
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
                        <input type="submit" value="Add to Cart" class="add-to-cart-btn">
                    </form>
                    <br>
                    <a href="{{ route('product.show', ['product'=>$item]) }}">View Product</a>
                </figure>
            </div>
        @endforeach
    </div>

@endsection
