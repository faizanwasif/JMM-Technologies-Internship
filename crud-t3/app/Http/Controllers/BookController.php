<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){

        $books = Book::all();

        return view("books",  [
            'books' => $books,
        ]);
    }

    public function create(){
        return view("create");
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pubyear' => 'required'
        ]);

        // add data in db
        $addNewBook = Book::create($data);
        return redirect(route('book.store'));
    }

    public function edit(Book $book){
        return view('edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pubyear' => 'required'
        ]);

        // update data in db
        $book -> update($data);
        return redirect(route('book.store'))->with('success', 'Book updated succesfully!');
    }

    public function destroy(Book $book){

        $book -> delete();
        
        return redirect(route('book.store'))->with('success', 'Book deleted succesfully!');
    
    }
}
