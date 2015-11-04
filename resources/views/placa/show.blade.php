@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Detalles de Placa</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Numero:</strong> {{{$model->numero}}} <br>
    </p>
    
    {!! link_to_route('miembro.show', 'Volver', ['id' => $miembro->id], ['class' => 'btn btn-default']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['miembro.placa.destroy', $miembro->id, $model->id], 
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger ']) !!}
    {!! Form::close() !!}
  </div>
@stop
