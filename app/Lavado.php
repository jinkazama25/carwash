<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lavado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_lavado','monto','id_carro','id_usuario',
    ];

    
    protected $hidden = [
     'remember_token',
    ];
   
}
