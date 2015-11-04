<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placa extends Model
{
    protected $table = "placa";
    public function placas()
    {
        return $this->belongsTo('App\Miembro');
    }
}
