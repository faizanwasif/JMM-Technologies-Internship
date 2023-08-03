@extends('layouts.layout')

@section('content')
    <h1>Insert Country Data</h1>

    @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form action="{{ route('country.add') }}" method="post">
        @csrf
        @method('post')

        <label for="name">Name</label>
        <input type="text" name="name" id="country-name">

        {{-- button --}}
        <input type="button" value="Add">
    </form>
@endsection