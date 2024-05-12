<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all(); // Fetch all users, adjust according to your model
        return view('components.user-layout', compact('users'));
    }
}
