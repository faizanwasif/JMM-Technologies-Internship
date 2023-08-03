@extends('layouts.layout')

@section('content')
    <h1>Update State Data</h1>

    @if ($errors->any())
        <div  style="color: red;">
            <ul>
                @foreach ($errors->all() as  $error)
                    <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('state.update' , ['state' => $state]) }}">
        @csrf
        @method('put')

        <label for="name">Name</label>
        <input type="text" name="name" id="state-name" value="{{ $state->name }}">

        {{-- button --}}
        <input type="submit" value="Add">
    </form>
@endsection