<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;

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
        $mice = Mouse::all();
        return view('home', ['mice' => $mice]);
    }

    public function detail($id)
    {
        $mice = Mouse::find($id);
        return view('detail', ['mice' => $mice]);
    }
}
