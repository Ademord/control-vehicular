@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>
      Lugares
      @include('includes.create_button')
      @include('includes.search',['url'=>'lugar'])
    </h1>
	</div>
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
    <table class="table">
      @if ($data->count())
        <thead>
          <tr>
            <th>Nombre</th>
            <th width="90%"><!-- spacer --></th>
            <th><!-- actions --></th>
          </tr>
        </thead>
        <tbody>
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

      @else
        <tr>
          <td>No hay registros.</td>
        </tr>
      @endif
      
    </table>
  </div>

@stop
