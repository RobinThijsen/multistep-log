<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        if (Auth::user()) {
            return redirect(route('app.dashboard'));
        }

        return redirect(route('app.register'));
    }
}
