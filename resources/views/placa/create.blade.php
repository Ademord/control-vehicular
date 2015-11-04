@extends('layouts.default')
@section('content')
	<div class="page-header">
    <h1>Nueva placa</h1>
	</div>
  
  @include('placa.partials._session')

  {!! Form::open(array('route' => ['miembro.placa.store', $miembro->id])) !!}
    @include('placa.partials._form')
  {!! Form::close() !!}
@stop
