@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h2>Detalles de Miembro</h2>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Nombres:</strong> {{{$model->nombres}}}<br>
      <strong>Apellidos:</strong> {{{$model->apellidos}}}<br>
      <strong>Codigo Administrativo:</strong> {{{$model->cod_administrativo}}}
    </p>
    @include('miembro.partials._session')
    <div class="panel panel-default with-table">
    <div class="panel-heading">
      <div class="row">
        <div class="col-md-8">
          <a class="btn btn-primary btn-sm" href="{{{ Request::url() }}}/placa/create">
            <span class="glyphicon glyphicon-file"></span>
            Nuevo
          </a>
        </div>
        <div class="col-md-4">
      
        </div>
      </div>
    </div>
    
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Placa</th>
              <th width="90%"><!-- spacer --></th>
              <th><!-- actions --></th>
            </tr>
          </thead>
          
          <tbody>
          @if (!count($placas))
            <tr>
              <td colspan="{{{1 + 2}}}">No hay registros.</td>
            </tr>
          @endif
          @foreach ($placas as $placa)
            <tr>
              <td>{{{$placa->numero}}}</td>
              <td><!-- spacer --></td>
    
              <td class="actions">
                <a href="{{{ route('miembro.placa.show', [$model->id, $placa->id]) }}}" class="btn btn-xs btn-default">
                  <span class="glyphicon glyphicon-remove"></span>
                  Detalles
                </a>
                
                <a href="{{{ route('miembro.placa.edit', [$model->id, $placa->id]) }}}" class="btn btn-xs btn-default">
                  <span class="glyphicon glyphicon-pencil"></span>
                  Modificar
                </a>
                
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
