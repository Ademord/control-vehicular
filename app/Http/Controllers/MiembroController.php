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
        $query = \Request::get('q');

        $data = $query
            ? Miembro::where('nombres', 'LIKE', "%$query%")->latest('created_at')->paginate(5)
            : Miembro::orderBy('created_at','asc')->paginate(5);

        return view('miembro.index', compact('data'));
    }

    public function show($id)
    {
        $model = Miembro::findOrFail($id);
        $placas = $model->placas()->get();   
        return view('miembro.show', compact('model', 'placas'));
    }
}
