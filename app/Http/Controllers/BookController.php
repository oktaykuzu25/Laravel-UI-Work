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
}
