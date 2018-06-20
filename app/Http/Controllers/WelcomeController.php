<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;

class WelcomeController extends Controller
{
    public function index()
    {
    	$quant_servicos = Servico::all()->count();
    	return view('welcome', compact('quant_servicos'));
    }
}
