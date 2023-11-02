<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Expenses;
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
        $expenses = Expenses::first();
        $alternatives = Alternative::all();

        return view('index', ['amount' => $expenses->price, 'alternatives' => $alternatives]);
    }
}
