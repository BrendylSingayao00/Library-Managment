<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        // Get book statistics
        $totalBooks = Book::count();
        $availableBooks = Book::where('quantity', '>', 0)->count();
        $newBooks = Book::whereDate('created_at', '>=', now()->subDays(30))->count(); // Assuming new books are those created in the last 30 days
        $books = Book::all();

        return view('app.dashboard', compact('totalBooks', 'availableBooks', 'newBooks', 'books'));
    }
}
