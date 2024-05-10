<?php

namespace App\Http\Controllers\App;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::all(); // Fetch all borrow records
        return view('app.borrow.library', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_borrow' => 'required|date',
            'date_return' => 'required|date',
        ]);

        // Find the book by its ID
        $book = Book::findOrFail($request->book_id);

        // Create a new borrow record and associate it with the book
        $borrow = new Borrow();
        $borrow->book_id = $book->id;
        $borrow->book_title = $book->title;
        $borrow->author = $book->author;
        $borrow->description = $book->description;
        $borrow->book_cover = $book->book_cover;
        $borrow->name = $request->name;
        $borrow->email = $request->email;
        $borrow->student_id = $request->student_id;
        $borrow->date_borrow = $request->date_borrow;
        $borrow->date_return = $request->date_return;
        $borrow->save();

        // return view('app.borrow.library')->with('success', 'Book borrowed successfully!');
        return redirect()->route('borrow.library')->with('success', 'Book borrowed successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('app.books.show', compact('book'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    public function borrow(Book $book)
    {
        return view('app.borrow.create', compact('book'));
    }

    public function library()
    {
        // Assuming 'library.blade.php' is located in 'resources/views/app/borrow' folder
        // return view('app.borrow.library');
        // $borrows = Borrow::all();

        // return view('app.borrow.library', compact('borrows'));
        $userName = Auth::user()->name;

        // Fetch borrow records where the name matches the current user's name
        $borrows = Borrow::where('name', $userName)->get();

        return view('app.borrow.library', compact('borrows'));
    }

    public function borrowing()
    {
        $borrows = Borrow::all();

        return view('app.borrow.borrowing', compact('borrows'));
    }
}
