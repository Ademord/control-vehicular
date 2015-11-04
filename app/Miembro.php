<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = "miembro";
    public function placas()
    {
        return $this->hasMany('App\Placa');
    }
}
