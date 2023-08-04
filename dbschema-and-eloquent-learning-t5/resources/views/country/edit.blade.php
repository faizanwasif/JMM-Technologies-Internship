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

    <form method="post" action="{{ route('country.update', ['country' => $country]) }}" style=" text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); color:black">
        @csrf
        @method('put')
    
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 10px;">Country Name</label>
        <input type="text" name="name" id="country-name" value="{{ $country->name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px; box-sizing: border-box; margin-bottom: 20px;">
    
        <input type="submit" value="Update" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
    </form>
    
@endsection