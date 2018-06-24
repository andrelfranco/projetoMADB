<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contrato;
use Auth;

class ProfileController extends Controller
{
    public function getPerfil()
    {
    	//$profile = Auth::user();
    	$profile = User::with('servicos', 'contratos')->find(Auth::user()->_id);

    	for($i = 0; isset($profile->contratos[$i]); $i++)
    	{
    		$profile->contratos[$i] = Contrato::with('servico')->find($profile->contratos[$i]->_id);
    	}
    	//$contratos = Contrato::with('servicos', 'contratos')->find(Auth::user()->_id);
    	return view('profile.perfil', compact('profile'));
    }

    public function storeAvaliacao(Request $request, Contrato $contrato)
    {
        $contrato->update($request->all());

        return redirect()->route('meu-perfil');
    }
}
