<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function index()
    {
        return view("porto.myAccount");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
