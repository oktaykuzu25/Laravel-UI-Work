<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;
use App\Models\User;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::notDeleted()->visibleTo(auth()->user())->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(BookStoreRequest $request)
    {
        $books = new Book();
        $books->name = $request->name;
        $books->price = $request->price;
        $books->is_deleted = 0;
        $books->user_id = auth()->id();
        $books->save();
        return redirect()->route('books.index');
    }
    public function edit($id)
    {
        $book = Book::notDeleted()->visibleTo(auth()->user())->findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::notDeleted()->visibleTo(auth()->user())->findOrFail($id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::notDeleted()->visibleTo(auth()->user())->findOrFail($id);
        $book->update(['is_deleted' => 1]);

        return redirect()->route('books.index');
    }
}
