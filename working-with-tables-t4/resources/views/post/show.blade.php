@extends('layouts.layout')

@section('content')
    <h1>Post List</h1>

    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Publication Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['content'] }}</td>
                <td>{{ $post['pubdate'] }}</td>

                <td style='background-color: rgb(0, 174, 255); padding: 5px;'>
                    <a href="{{ route('post.edit', ['post' => $post] ) }}">Edit</a>
                </td>
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('post.destroy', ['post' => $post] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' style='width: 100%; height: 100%; background-color: #FF6347; color: white; border: none; padding: 5px; cursor: pointer;'>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('post.create') }}" style='text-align: center; margin-top: 20px;'>
        <button type='submit' style='height:50px; width: 100%; max-width: 200px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Add Blogs</button>
    </form>
@endsection