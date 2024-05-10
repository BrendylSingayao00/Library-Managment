<?php

namespace App\Http\Controllers\App;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;



class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_of_borrow' => 'required|date',
            'date_of_return' => 'required|date',
        ]);

        $borrow = new Borrow();
        $borrow->book_id = $request->book_id;
        $borrow->student_name = $request->student_name;
        $borrow->student_id = $request->student_id;
        $borrow->email = $request->email;
        $borrow->date_of_borrow = $request->date_of_borrow;
        $borrow->date_of_return = $request->date_of_return;
        $borrow->save();

        return redirect()->route('books.index')->with('success', 'Book borrowed successfully!');
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
}
