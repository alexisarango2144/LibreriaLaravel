<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->paginate(2);

        return view('books.index', compact('books'));
    }

    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer|min:0',
            'isbn' => 'required|string|unique:books,isbn'
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer|min:0',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id
        ]);

        $book->update($validatedData);

        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully.');
    }

    public function destroy($bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
