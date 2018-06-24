<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quant_servicos = Servico::all()->count();
        return view('welcome', compact('quant_servicos'));
    }
}
