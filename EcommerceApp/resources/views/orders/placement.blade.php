@extends('layouts.app')

@section('content')
    <h1>Place Order</h1>

    <form action="" method="post">
        <label for="email">Email</label>
            <input type="email" value="{{ $user->email }}">
        
        <label for="name">Name</label>
            <input type="text" value="{{ $user->name }}">
        
        <label for="address">Address</label>
            <input type="text" id="address">
            
        <label for="phone">Phone</label>
            <input type="tel" value="">

        <input type="submit" value="Place Order">
    </form>
    
@endsection