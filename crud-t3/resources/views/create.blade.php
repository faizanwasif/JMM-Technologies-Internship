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
    <div style="text-align: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px;">
        <h1>Add record</h1>
    
        <form method="post" action="{{ route('book.store') }}" style="display: inline-block; text-align: left; width: 300px;">
    
            @csrf
            @method('post')
    
            <label for="title" style="display: block; font-weight: bold;">Title</label>
            <input type="text" name="title" style="display: block; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <label for="author" style="display: block; font-weight: bold;">Author</label>
            <input type="text" name="author" style="display: block; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <label for="pubyear" style="display: block; font-weight: bold;">Publication Year</label>
            <input type="date" name="pubyear" style="display: block; width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            
            <input type="submit" value="Add book" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;">
    
        </form>
    </div>
    
</body>
</html>