<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Servico;
use App\Contrato;
use Auth;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responsewith
     */
    public function create($id_servico)
    {
        //$servico = Servico::find($id_servico);
        $servico = Servico::with('usuarios')->find($id_servico);
        return view('contrato.create', compact('servico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_servico)
    {
        $usuario = User::find(Auth::user()->_id);
        $servico = Servico::find($id_servico);

        $contrato = Contrato::create($request->all());

        $contrato->servico()->save($servico);
        $contrato->usuario()->save($usuario);

        //$contrato = Contrato::with('usuario', 'servico')->find($contrato->id);
        //dd($contrato);

        return redirect()->route('servico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
