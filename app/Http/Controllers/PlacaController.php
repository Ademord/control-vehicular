<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Placa;
use App\Miembro;
use DB;
use Validator;


class PlacaController extends Controller
{
    public function create($miembro_id)
    {
        $miembro = Miembro::findOrFail($miembro_id);
        return view('placa.create', compact('miembro'));
    }
    
    public function store(Request $request, $miembro_id)
    {
        $miembro = Miembro::findOrFail($miembro_id);
        $rules = [
              'numero' => 'required|unique:placa'
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect('miembro/'. $miembro_id . '/placa/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $model = new Placa();
        $model->numero = $request['numero'];
        $model->miembro_id = $miembro_id;
        $model->save();
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa creada exitosamente!');
    }

    public function edit($miembro_id, $id)
    {
      $miembro = Miembro::findOrFail($miembro_id);
      $model = Placa::findOrFail($id);
      return view('placa.edit', compact('miembro', 'model'));
    }

    public function show($miembro_id, $id)
    {
      $miembro = Miembro::findOrFail($miembro_id);
      $model = Placa::findOrFail($id);
      return view('placa.show', compact('miembro', 'model'));
    }
    
    public function update(Request $request, $miembro_id, $id)
    {
        $rules = [
              'numero' => 'required'
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->action('PlacaController@edit', [$miembro_id, $id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $model = Placa::find($id);
        $model->numero = $request['numero'];
        $model->miembro_id = $miembro_id;
        $model->save();
        
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa actualizada exitosamente!');
    }

    public function destroy($miembro_id, $id)
    {
        $model = Placa::findOrFail($id);
        $model->delete();
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa eliminada exitosamente!');
    }
}
