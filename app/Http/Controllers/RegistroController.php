<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests\CreateRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Registro;
use DB;
use Illuminate\Http\Response;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Registro::all();
        $columns = DB::getSchemaBuilder()->getColumnListing('registro');
        $columns = array_slice($columns, 1, -2); 
        $columns[array_search('created_at', $columns)] = 'Fecha';        
        $columns[array_search('filename', $columns)] = 'Imagen';        
        //return var_dump($data);
        return view('registros.index', compact('data', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function get($filename)
    {
        $entry = Registro::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        
        $response = response($file, 200, [
            'Content-Type' => $entry->mime,
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$entry->filename}",
            'Content-Transfer-Encoding' => 'binary',
        ]);

        ob_end_clean(); // <- this is important

        return $response;
    }

    public function requestHasFilefield($request)
    {
        return $request->hasFile('filefield')
            && $request->file('filefield')->isValid()
            && ($request->file('filefield')->getError() == UPLOAD_ERR_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Registro::findOrFail($id);
        return view('registros.show')->withModel($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $model = Registro::findOrFail($id);
        try {
            Storage::delete($model->filename);
        } catch (Exception $e) {
            // The file was deleted on the server, someone should know about this...
        }
        $model ->delete();

        return redirect('registros')->with('message','Registro eliminado exitosamente!');
    }


}
