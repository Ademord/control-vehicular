@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>
      Miembros
      @include('includes.search',['url'=>'miembro'])
    </h1>
	</div>

  <div class="panel panel-default with-table">
  
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Codigo Administrativo</th>
          <th>Placa</th>
          <th width="90%"><!-- spacer --></th>
          <th><!-- actions --></th>
        </tr>
      </thead>
      
      <tbody>
      @if ($data->count())
         @foreach ($data as $model)
          <tr>
            <td>{{{$model->nombres}}}</td>
            <td>{{{$model->apellidos}}}</td>                    
            <td>{{{$model->cod_administrativo}}}</td>
            <td>{{{($aux = DB::table('matriculas')->select('numero')->where('miembro_id', '=', $model->id)->take(1)->get()) ? $aux[0]->numero : "-"}}}</td>                     
            <td><!-- spacer --></td>

            <td class="actions">
              <a href="{{{ route('miembro.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
                <span class="glyphicon glyphicon-remove"></span>
                Detalles
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
