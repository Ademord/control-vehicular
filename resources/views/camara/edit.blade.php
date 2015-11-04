@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Editar Camara</h1>
	</div>
  
  @include('camara.partials._session')

  {!! Form::model($model, array('route' => ['camara.update', $model->id], 'method' => 'PUT')) !!}
    @include('camara.partials._form')
  {!! Form::close() !!}

@stop
