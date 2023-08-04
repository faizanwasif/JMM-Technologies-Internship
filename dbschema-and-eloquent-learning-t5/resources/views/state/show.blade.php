@extends('layouts.layout')

@section('content')
    <h1>State List</h1>
    <table>
        <tr>
            <th>State</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
            @foreach ($stateInfo as $info)
            <tr>
                <td>
                    {{ $info['name'] }}
                </td>
                
                {{-- Edit Button --}}
                <td>
                    <a href="{{ route('state.edit', ['state' => $info] ) }}">Edit</a>
                </td>
        
                {{-- Deal with deletion later --}}
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('state.delete', ['state' => $info] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete'  class="delete-button">
                    </form>
                </td>
            </tr>
            @endforeach
        
    </table>


    {{--  Add button --}}
    <form action="{{ route('state.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' >Add States</button>
    </form>
@endsection