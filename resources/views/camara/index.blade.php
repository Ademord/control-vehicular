@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Camaras
    @include('includes.create_button')
    @include('includes.search',['url'=>'camara'])
    </h1>
  </div>
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
  
  <!-- <div class="table-responsive"> 
  -->
    <table class="table">
      
      <thead>
        <tr>
          <th>IP</th>
          <th>Lugar</th>
          <th width="90%"><!-- spacer --></th>
          <th><!-- actions --></th>
        </tr>
      </thead>
      
      <tbody>
      @if ($data->count())
        @foreach ($data as $model)
          <tr>
            <td>{{{$model->ip}}}</td>
            
            <td>{{{ DB::table('lugar')->where('id', $model->lugar_id)->first()->nombre  }}}</td>
            <td><!-- spacer --></td>

            <td class="actions">
              <a href="{{{ route('camara.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
                <span class="glyphicon glyphicon-remove"></span>
                Detalles
              </a>
              
              <a href="{{{ route('camara.edit', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
                <span class="glyphicon glyphicon-pencil"></span>
                Modificar
              </a>
              
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td>No hay registros.</td>
        </tr>
      @endif
      </tbody>
    </table>
  </div>
@stop
