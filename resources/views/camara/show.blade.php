@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Detalles de Camara</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>IP:</strong> {{{$model->ip}}} <br>
      <strong>Lugar:</strong> {{{ DB::table('lugar')->where('id', $model->lugar_id)->first()->nombre }}}
    </p>
    
    {!! link_to_route('camara.index', 'Volver', null, ['class' => 'btn btn-default']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['camara.destroy', $model->id], 
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger ']) !!}
    {!! Form::close() !!}
  </div>
@stop
