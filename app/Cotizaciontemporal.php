<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizaciontemporal extends Model
{
    //
    public $timestamps = false;
    public function productos(){
        return $this->hasMany('App\Productos');
    }
    public function usuario(){
        return $this->belongsTo('App\User');
    }
}
