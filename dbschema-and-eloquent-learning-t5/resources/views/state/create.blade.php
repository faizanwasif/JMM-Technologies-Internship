@extends('layouts.layout')

@section('content')
    <h1>Insert State Data</h1>

    @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form action="{{ route('state.add') }}" method="post">
        @csrf
        @method('post')

        <label for="name">Name</label>
        <input type="text" name="name" id="state-name">
        <br> <br>
        <select name="country_id" id="countryInfo">
            @foreach ($countryInfo as $info)
                <option value="{{ $info->id}}">{{ $info->name }}</option>
            @endforeach
        </select>

        <br> <br>
        {{-- button --}}
        <input type="submit" value="Add">
    </form>
@endsection