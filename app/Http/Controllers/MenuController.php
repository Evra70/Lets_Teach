<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function kursus()
    {
        return view('kursus');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function tentangKami()
    {
        return view('tentang_kami');
    }
}
