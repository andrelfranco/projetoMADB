<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Usuario extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'usuarios';
    protected $table = 'usuarios';

    protected $guarded = [];

    public function servicos()
    {
    	return $this->belongsToMany(Servico::class);
    }
}
