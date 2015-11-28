<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Miembro;
use DB;

class MiembroController extends Controller
{
    public function index()
    {
        $data = Miembro::all();
        $columns = DB::getSchemaBuilder()->getColumnListing('miembro');
        $columns = array_slice($columns, 1, -2); 
        //$placas = $model->placas()->get();
        return view('miembro.index', compact('data', 'columns'));
    }

    public function show($id)
    {
        $model = Miembro::findOrFail($id);
        $placas = $model->placas()->get();   
        return view('miembro.show', compact('model', 'placas'));
    }
}
