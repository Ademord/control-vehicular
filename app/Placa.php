<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placa extends Model
{
    protected $table = "matriculas";
    public function placas()
    {
        return $this->belongsTo('App\Miembro');
    }
}
