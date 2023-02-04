<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Bis::latest();
        return view('pages.home', compact('datas'));
    }
}
