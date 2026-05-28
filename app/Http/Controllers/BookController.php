<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $books = new Book();
        $books->name = $request->name;
        $books->price = $request->price;
        $books->save();
        return redirect()->route('books.index');
    }
    public function edit($id)
    {
        $book = Book::findorfail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
