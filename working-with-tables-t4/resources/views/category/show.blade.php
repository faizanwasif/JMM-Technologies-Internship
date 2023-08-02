@extends('layouts.layout')

@section('content')
    <h1>Category List</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td>{{ $category['name'] }}</td>
                <td>{{ $category['desc'] }}</td>

                <td style='background-color: rgb(0, 174, 255); padding: 5px;'>
                    <a href="{{ route('category.edit', ['category' => $category] ) }}">Edit</a>
                </td>
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('category.destroy', ['category' => $category] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' style='width: 100%; height: 100%; background-color: #FF6347; color: white; border: none; padding: 5px; cursor: pointer;'>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('category.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' style='height:50px; width: 100%; max-width: 200px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Add Blogs</button>
    </form>
@endsection