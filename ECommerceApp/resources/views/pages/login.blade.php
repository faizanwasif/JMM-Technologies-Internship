@extends('layouts.layout');
@section('content')
    <h1>Login Page</h1>
    <form action="{{ route(pages.home) }}" method="post">
        <label for="email">Email</label><input type="email" name="email" id="email">
        <label for="password">Password</label><input type="password" name="passsword" id="password">
        <input type="submit" value="Login">
    </form>
@endsection