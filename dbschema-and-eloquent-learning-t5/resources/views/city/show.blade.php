@extends('layouts.layout')

@section('content')
    <h1>city List</h1>
    <table>
        <tr>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
            @foreach ($cityInfo as $info)
            <tr>
                <td>
                    {{ $info['name'] }}
                </td>
                
                {{-- Edit Button --}}
                <td>
                    <a href="{{ route('city.edit', ['city' => $info] ) }}">Edit</a>
                </td>
        
                {{-- Deal with deletion later --}}
                <td >
                    <form method='post' action="{{ route('city.delete', ['city' => $info] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' class="delete-button">
                    </form>
                </td>
            </tr>
            @endforeach
        
    </table>


    {{--  Add button --}}
    <form action="{{ route('city.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' >Add Cities</button>
    </form>
@endsection