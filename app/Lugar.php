<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = "lugares";
    protected $fillable = array('nombre');
    public function camaras()
    {
        return $this->hasMany('App\Camara');
    }
}
