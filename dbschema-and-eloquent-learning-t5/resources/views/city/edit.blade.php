@extends('layouts.layout')

@section('content')
    <h1>Update City Data</h1>

    @if ($errors->any())
        <div  style="color: red;">
            <ul>
                @foreach ($errors->all() as  $error)
                    <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('city.update' , ['city' => $city]) }}">
        @csrf
        @method('put')

        <label for="name">Name</label>
        <input type="text" name="name" id="city-name" value="{{ $city->name }}">

        {{-- button --}}
        <input type="submit" value="Add">
    </form>
@endsection