@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Lugares</h1>
	</div>
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
  @include('includes.create_button')
  
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
        @foreach ($columns as $prop ) 
          <th>{{{ ucfirst($prop) }}}</th>
        @endforeach
          <th width="90%"><!-- spacer --></th>
          <th><!-- actions --></th>
        </tr>
      </thead>
      
      <tbody>
      @if (!count($data))
        <tr>
          <td colspan="{{{count($columns) + 2}}}">No hay registros.</td>
        </tr>
      @endif
      @foreach ($data as $model)
        <tr>
          <td>{{{$model->nombre}}}</td>
          <td><!-- spacer --></td>

          <td class="actions">
            <a href="{{{ route('lugar.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
              <span class="glyphicon glyphicon-remove"></span>
              Detalles
            </a>
            
            <a href="{{{ route('lugar.edit', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
              <span class="glyphicon glyphicon-pencil"></span>
              Modificar
            </a>
             
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

@stop
