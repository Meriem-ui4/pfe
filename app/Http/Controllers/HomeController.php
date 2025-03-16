<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('home', ['showFooter' => true]);
        return view('home', ['showHeader' => false]);
    }
}