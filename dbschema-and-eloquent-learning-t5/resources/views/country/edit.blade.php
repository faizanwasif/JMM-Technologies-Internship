@extends('layouts.layout')

@section('content')
    <h1>Update Country Data</h1>

    @if ($errors->any())
        <div  style="color: red;">
            <ul>
                @foreach ($errors->all() as  $error)
                    <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('country.update' , ['country' => $country]) }}">
        @csrf
        @method('put')

        <label for="name">Name</label>
        <input type="text" name="name" id="country-name" value="{{ $country->name }}">

        {{-- button --}}
        <input type="button" value="Add">
    </form>
@endsection