<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lugar;
use DB;
use Validator;


class LugarController extends Controller
{
    public function __construct(){
      $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function index()
    {
        $data = Lugar::all();
        $columns = DB::getSchemaBuilder()->getColumnListing('lugar');
        $columns = array_slice($columns, 1, -2); 
        return view('lugar.index', compact('data', 'columns'));
    }

    public function create()
    {
        return view('lugar.create');
    }

    public function store(Request $request)
    {
        $rules = [
              'nombre' => 'required|unique:lugar' 
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect('lugar/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Lugar::firstOrCreate($request->except('_token')); 
        return redirect('lugar')->with('message','Lugar creado exitosamente!');
    }
    
    public function show($id)
    {
        $model = Lugar::findOrFail($id);
        return view('lugar.show')->withModel($model);
    }

    public function edit($id)
    {
        $model = Lugar::findOrFail($id);
        return view('lugar.edit')->withModel($model);
    }

    public function update(Request $request, $id)
    {
        $rules = [
              'nombre' => 'required' 
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect('lugar/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        Lugar::where('id', $id)->update($request->only('nombre')); 
        return redirect('lugar')->with('message','Lugar actualizado exitosamente!');
    }

    public function destroy($id)
    {
        $model = Lugar::findOrFail($id);
        $model ->delete();

        return redirect('lugar')->with('message','Lugar eliminado exitosamente!');
    }
}
