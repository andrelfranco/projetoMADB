<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Servico;
use Auth;


class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('servico.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$usuarios = Usuario::all();
        //$usuarios = User::all()->pluck('nome', '_id');
        //return view('servico.create', compact('usuarios'));

        return view('servico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$usuario = Usuario::find($request->usuario_id)->toArray();
        //$usuario['servicos'][] = $request->all();
        //Usuario::update($usuario);

       //$teste = Usuario::all();

        //$teste = Usuario::with('getServico')->where(['servicos'], ['' => '5b22e926c50edc0944000ede'])->get();
        
        //$teste = Servico::with('getUsuario')->where('usuario_id', $request->usuario_id)->get();

        //$teste = Servico::find('5b27de97c50edc0834005ae2')->getUsuario();
        //$teste = Usuario::find($request->usuario_id)->getServicos()->get();
        //dd($teste);

        //$teste = Servico::first();

        /*
        *
        *DEU CERTO
        *
        */
        $usuario = User::find(Auth::user()->_id);
        //$usuario = Usuario::with('servicos')->find($request->usuario_id);
        //dd($usuario);
        //////////////////////////////////

        $servico = Servico::create($request->except('usuario_id'));
        //$servico->push('usuario_ids', [$request->usuario_id]);
        $servico->usuarios()->save($usuario);

        //$usuario = Usuario::find($request->usuario_id)->push('servico_ids', [$servico->_id]);

        return redirect()->route('servico.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servico::with('usuarios', 'contratos')->find($id);
        $avaliacao = $servico->contratos()->get()->avg('avaliacao');

        return view('servico.show', compact('servico', 'avaliacao'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = Servico::find($id);

        return view('servico.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico)
    {
        $servico->update($request->all());
        return redirect()->route('servico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::with('usuarios')->find($id);
        //dd($servico->usuarios[0]->_id);
        //$servico = Servico::find($id);
        //$usuario = Usuario::with('servicos')->find($servico->usuario_ids[0]);
        //dd($usuario->servicos);
        $servico->usuarios()->detach($servico->usuarios[0]->_id);
        $servico->delete();

        return redirect()->route('servico.index');
    }
}
