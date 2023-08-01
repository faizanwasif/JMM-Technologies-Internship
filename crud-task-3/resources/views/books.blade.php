<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Task 3</h1>
    @if(session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <div>
        <table border='1' style='border-collapse: collapse; width: 100%; text-align: center;'>
            <tr>
                <th style='padding: 10px; background-color: #f2f2f2;'>Name</th>
                <th style='padding: 10px; background-color: #f2f2f2;'>Author</th>
                <th style='padding: 10px; background-color: #f2f2f2;'>Publication Year</th>
                <th style='padding: 10px; background-color: #f2f2f2;'>Edit</th>
                <th style='padding: 10px; background-color: #f2f2f2;'>Delete</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td style='padding: 10px;'>{{ $book['title'] }}</td>
                <td style='padding: 10px;'>{{ $book['author'] }}</td>
                <td style='padding: 10px;'>{{ $book['pubyear'] }}</td>
                <td style='background-color: rgb(0, 174, 255); padding: 5px;'>
                    <a href="{{ route('book.edit', ['book' => $book] ) }}" style='color: white; text-decoration: none;'>Edit</a>
                </td>
                <td style='padding: 5px;'>
                    <form method='post' action="{{ route('book.destroy', ['book' => $book] ) }}" style='margin: 0;'>
                        @csrf
                        @method('delete')
                        <input type='submit' value='Delete' style='width: 100%; height: 100%; background-color: #FF6347; color: white; border: none; padding: 5px; cursor: pointer;'>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <form action="{{ route('book.create') }}" style='text-align: center; margin-top: 20px;'>
            <button type='submit' style='height:50px; width: 100%; max-width: 200px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Add Books</button>
        </form>
        
        
    </div>
</body>
</html>