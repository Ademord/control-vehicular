@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Detalles de Registro</h1>
	</div>
  <div class="col-lg-7">
    <p>
      {!! Form::label('fecha', 'Fecha: ') !!}
      {{{$model->created_at}}} 
      <br>
      {!! Form::label('camara', 'Camara: ') !!}
      {{{$model->camara}}} 
      <br>
      {!! Form::label('lugar', 'Lugar: ') !!}
      {{{$model->lugar}}} 
      <br>
      {!! Form::label('placa', 'Placa: ') !!}
      {{{$model->placa}}} 
      <br>
      {!! Form::label('filefield', 'Imagen: ') !!}
      <div class="input-group">
        <span class="input-group-addon">
          <a href="{{ route('getentry', $model->filename)}}">{{$model->filename}}</a>
        </span>
      </div>
    </p>
    
    {!! link_to_route('registros.index', 'Volver', null, ['class' => 'btn btn-default']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['registros.destroy', $model->id], 
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger ']) !!}
    {!! Form::close() !!}
  </div>
@stop
