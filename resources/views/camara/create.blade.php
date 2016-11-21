@extends('layouts.default')
@section('content')
	<div class="page-header">
    <h1>Nuevo Cliente</h1>
	</div>
  
  @include('camara.partials._session')

  {!! Form::open(array('route' => 'camara.store')) !!}
    @include('camara.partials._form')
  {!! Form::close() !!}
@stop
