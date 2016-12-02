<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camara extends Model
{
    protected $table = "camaras";
    protected $fillable = array('ip', 'lugar_id');
  
}
