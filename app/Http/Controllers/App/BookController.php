<?php

namespace App\Http\Controllers\App;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('app.books.index', compact('books'));
        // return view('app.books.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'book_cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as per your requirements
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->category = $request->category;

        // Handle file upload
        if ($request->hasFile('book_cover')) {
            $image = $request->file('book_cover');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
        }

        // Save book data to the database
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category' => $request->category,
            'book_cover' => $imageName ?? null, // Use null if no file uploaded
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
