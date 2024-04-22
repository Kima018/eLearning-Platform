<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homePage():RedirectResponse
    {
        if (!Auth::user()) {
            return redirect('/login');
        }
        return redirect('/all-lectures');
    }
}
