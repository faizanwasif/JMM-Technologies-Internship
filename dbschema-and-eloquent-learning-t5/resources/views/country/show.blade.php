@extends('layouts.layout')

@section('content')
    <h1>Country List</h1>
    <table>
        <tr>
            <th>Country</th>
        </tr>
        <tr>
            @foreach ($countryInfo as $info)
                <td>
                    {{ $info['name'] }}
                </td>
                
                {{-- Edit Button --}}
                <td style='background-color: rgb(0, 174, 255); padding: 5px;'>
                    <a href="{{ route('country.edit', ['country' => $info] ) }}">Edit</a>
                </td>
        
                {{-- Deal with deletion later --}}
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('country.delete', ['country' => $info] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' style='width: 100%; height: 100%; background-color: #FF6347; color: white; border: none; padding: 5px; cursor: pointer;'>
                    </form>
                </td>
            @endforeach
        </tr>
    </table>


    {{--  Add button --}}
    <form action="{{ route('country.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' >Add Countries</button>
    </form>
@endsection