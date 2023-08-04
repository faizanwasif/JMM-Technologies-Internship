@extends('layouts.layout')

@section('content')
    <h1>city List</h1>
    <table>
        <tr>
            <th>City</th>
        </tr>
        
            @foreach ($cityInfo as $info)
            <tr>
                <td>
                    {{ $info['name'] }}
                </td>
                
                {{-- Edit Button --}}
                <td style='background-color: rgb(0, 174, 255); padding: 5px;'>
                    <a href="{{ route('city.edit', ['city' => $info] ) }}">Edit</a>
                </td>
        
                {{-- Deal with deletion later --}}
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('city.delete', ['city' => $info] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' style='width: 100%; height: 100%; background-color: #FF6347; color: white; border: none; padding: 5px; cursor: pointer;'>
                    </form>
                </td></tr>
            @endforeach
        
    </table>


    {{--  Add button --}}
    <form action="{{ route('city.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' >Add Cities</button>
    </form>
@endsection