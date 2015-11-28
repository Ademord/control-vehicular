@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Miembros</h1>
	</div>

  <div class="panel panel-default with-table">
  
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
        @foreach ($columns as $prop ) 
          <th>{{{ ucfirst($prop) }}}</th>
        @endforeach
          <th>Placa</th>
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
          <td>{{{$model->nombres}}}</td>
          <td>{{{$model->apellidos}}}</td>                    
          <td>{{{$model->cod_administrativo}}}</td>
          <td>{{{($aux = DB::table('placa')->select('numero')->where('miembro_id', '=', $model->id)->take(1)->get()) ? $aux[0]->numero : "-"}}}</td>                     
          <td><!-- spacer --></td>

          <td class="actions">
            <a href="{{{ route('miembro.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
              <span class="glyphicon glyphicon-remove"></span>
              Detalles
            </a>
            
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

@stop
