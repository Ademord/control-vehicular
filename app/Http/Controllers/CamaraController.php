<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateCameraRequest;
use App\Http\Controllers\Controller;
use App\Lugar;
use App\Camara;
use DB;
use Validator;

class CamaraController extends Controller
{
    public function __construct(){
      $this->beforeFilter('csrf', ['on' => 'post']);
    }
    
    public function index()
    {
        $query = \Request::get('q');

        $data = $query
            ? Camara::where('ip', 'LIKE', "%$query%")->latest('created_at')->paginate(5)
            : Camara::orderBy('created_at','asc')->paginate(5);

        return view('camara.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares = Lugar::lists('nombre', 'id');
        return view('camara.create', compact('lugares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCameraRequest $request)
    {
        //$validator = Validator::make($request->all(), $rules, $messages);
        /*
        if ($validator->fails()) {
            return redirect('camara/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        */
        
        $model = new Camara();
        $model->ip = $request['ip'];
        $model->lugar_id = $request['lugar_id'];
        //return var_dump($model);
        $model->save();
        return redirect('camara')->with('message','Camara creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Camara::findOrFail($id);
        return view('camara.show')->withModel($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Camara::findOrFail($id);
        $lugares = Lugar::lists('nombre', 'id');
        return view('camara.edit', compact('model', 'lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $rules = [
              'ip' => 'required',
              'lugar_id' =>  'required'
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect('camara/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $model = Camara::find($id);
        $model->ip = $request['ip'];
        $model->lugar_id = $request['lugar_id'];
        $model->save();
        
        return redirect('camara')->with('message','Camara actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Camara::findOrFail($id);
        $model ->delete();

        return redirect('camara')->with('message','Camara eliminada exitosamente!');
    }
}
