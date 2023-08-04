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
    <form action="{{ route('state.add') }}" method="post" style="text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        @csrf
        @method('post')
    
        <label for="name" style="color: black; display: block; font-weight: bold; margin-bottom: 10px;">Name</label>
        <input type="text" name="name" id="state-name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px; box-sizing: border-box; margin-bottom: 20px;">
    
        <select name="country_id" id="countryInfo" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px; box-sizing: border-box; margin-bottom: 20px;">
            @foreach ($countryInfo as $info)
                <option value="{{ $info->id }}">{{ $info->name }}</option>
            @endforeach
        </select>
    
        <input type="submit" value="Add" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
    </form>
    
@endsection