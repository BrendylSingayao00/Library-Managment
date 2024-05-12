<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User; // Import your User model


class Header extends Component
{
    public $admin;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
