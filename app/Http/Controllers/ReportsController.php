<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Registro;
use DB;

class ReportsController extends Controller
{
    public function placas(){
        $dates = array();
        $plates = array();
        $dataset = 
            Registro::groupBy('day')->get([
            DB::raw('DATE(created_at) as day'),
            DB::raw('count(*) as placas_vistas')
        ]);

        foreach ($dataset as $data){
            array_push($dates, $data['day']);
            array_push($plates, $data['placas_vistas']);
        }
        return view('reportes.placas', compact('dates', 'plates'));
    }
}
