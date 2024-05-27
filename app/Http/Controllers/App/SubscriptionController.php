<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{

    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())->first();
        return view('app.subscribe.index', compact('subscription'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'book_limit' => 'required|in:10,20,30,100', // Add more options as needed
        ]);

        $user = Auth::user();
        $subscription = Subscription::updateOrCreate(
            ['user_id' => $user->id],
            ['book_limit' => $request->book_limit]
        );

        return redirect()->route('subscribe.index')->with('success', 'Subscription updated successfully');
    }

    // public function store(Request $request)
    // {
    //     // Validate request
    //     $request->validate([
    //         'type' => 'required|in:basic,premium', // Define your subscription types
    //     ]);

    //     // Create or update subscription
    //     $subscription = Subscription::updateOrCreate(
    //         ['user_id' => auth()->id()],
    //         ['type' => $request->type]
    //     );

    //     return redirect()->route('books.index')->with('success', 'Subscription updated successfully.');
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }
}