<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placa','marca','modelo','id_cliente',
    ];

    
    protected $hidden = [
     'remember_token',
    ];
   
}
