<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->paginate(2);
        $authors = Author::orderBy('name', 'asc')->get();

        return view('books.index', compact('books', 'authors'));
    }

    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::orderBy('name', 'asc')->get();
        return view('books.create', compact('authors'));
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
        $authors = Author::orderBy('name', 'asc')->get();
        return view('books.edit', compact('book', 'authors'));
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
