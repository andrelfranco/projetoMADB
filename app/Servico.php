<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Servico extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'servicos';
    protected $table = 'servicos';

    protected $guarded = [];

    public function usuarios()
    {
    	 return $this->belongsToMAny(User::class);
        //return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    public function contratos()
    {
        return $this->belongsToMany(Contrato::class);
    }

}
