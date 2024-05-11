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
        // return view('app.books.create');
        // $latestBook = Book::latest()->first();
        // $nextBookId = $latestBook ? $latestBook->book_id + 1 : 1;

        // return view('app.books.create', compact('nextBookId'));

        $latestBook = Book::latest()->first();
        $nextBookId = $latestBook ? $latestBook->book_id + 1 : 1;
        $books = Book::all(); // Get all books to pass to the borrow form

        return view('app.books.create', compact('nextBookId', 'books'));
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
            'quantity' => 'required|integer|min:1',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->category = $request->category;
        $book->quantity = $request->quantity;



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
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Pass only the selected book to the view
        return view('app.books.index', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Request $request)
    // {
    //     $book = Book::findOrFail($request->book_id);

    //     // Implement your edit logic here

    //     return redirect()->back()->with('success', 'Book edited successfully!');
    // }
    // Function to edit book
    public function edit(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        // Update book details
        $book->update([
            // Update fields as required
        ]);

        return redirect()->back()->with('success', 'Book edited successfully!');
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
    // public function destroy(Book $book)
    // {
    //     //
    // }
    // Delete book
    public function destroy($id)
    {
        // You can implement your logic to delete the book here
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully!');
    }
}
