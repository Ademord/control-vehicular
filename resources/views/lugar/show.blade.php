@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Detalles de Lugar</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Nombre:</strong> {{{$model->nombre}}}
    </p>
    
    {!! link_to_route('lugar.index', 'Volver', null, ['class' => 'btn btn-default']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['lugar.destroy', $model->id], 
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger ']) !!}
    {!! Form::close() !!}
  </div>
@stop
