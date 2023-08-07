@extends('layouts.app')

@section('content')
    <li>
        @foreach ($product as $item)
            <ul>{{ $item->name }}</ul>
        @endforeach
    </li>
@endsection