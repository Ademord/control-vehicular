@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Camaras</h1>
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
      
      @include('camara.partials._properties')
      
      <tbody>
      @if (!count($data))
        <tr>
          <td colspan="{{{count($columns) + 2}}}">No hay registros.</td>
        </tr>
      @endif
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
      </tbody>
    </table>
  </div>

@stop
