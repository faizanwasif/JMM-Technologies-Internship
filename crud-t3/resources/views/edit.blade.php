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
    <h1>Edit Record</h1>

    <form method="post" action="{{ route('book.update' , ['book' => $book]) }}">

        @csrf
        @method('put')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $book->title }}">
        
        <br><br>
        
        <label for="author">Author</label>
        <input type="text" name="author" value="{{ $book->author }}">
        
        <br><br>

        <label for="pubyear">Publication Year</label>
        <input type="date" name="pubyear" value="{{ $book->pubyear }}">
        
        <br><br>
        
        <input type="submit" value="Update book">
        
    </form>
</body>
</html>