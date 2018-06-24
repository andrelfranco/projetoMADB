<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Contrato extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'contratos';
    protected $table = 'contratos';

    protected $guarded = [];


    public function usuario()
    {
    	return $this->belongsToMany(User::class);
    }

    public function servico()
    {
    	return $this->belongsToMany(Servico::class);
    }
}
