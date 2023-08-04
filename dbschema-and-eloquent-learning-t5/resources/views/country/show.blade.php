@extends('layouts.layout')

@section('content')
    <h1>Country List</h1>
    <table>
        <tr>
            <th>Country</th>
            <th>Number of States</th>
            <th>Number of Cities</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($countryInfo as $info)
            <tr>
                <td>
                    {{$info['country_name']}}
                </td>
                
                <td>
                    {{ $info['states_count']}}
                </td>
                <td>
                    {{ $info['cities_count']}}
                </td>

                {{-- Edit Button --}}
                <td>
                    <a href="{{ route('country.edit', ['country' => $info['id']] ) }}">Edit</a>
                </td>
                
                {{-- Deal with deletion later --}}
                <td >
                    <form method='post' action="{{ route('country.delete', ['country' => $info['id']] ) }}" class="delete-form">
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' class="delete-button" >
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {{--  Add button --}}
    <form action="{{ route('country.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' >Add Countries</button>
    </form>
@endsection