@extends('layouts.default')
@section('content')


	<div class="page-header">
		<h1>
      Registros
      @include('includes.search',['url'=>'registros'])
    </h1>
	</div>
  @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
  
    <table class="table">
      
      @include('registros.partials._properties')
      
      <tbody>
      @if (!count($data))
        <tr>
          <td colspan="{{{count($columns) + 2}}}">No hay registros.</td>
        </tr>
      @endif
      @foreach ($data as $model)
        @if ($model->mismatch)
          <tr class="danger">
        @else
          <tr>
        @endif
          <td>{{{$model->camara}}}</td>
          <td>{{{$model->lugar}}}</td>
          <td>{{{$model->placa}}}</td>
          <td>{{{$model->miembro}}}</td>
          <td>{{{$model->created_at}}}</td>
          <td><!-- spacer --></td>

          <td class="actions">
            <a href="{{{ route('registros.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-default">
              <span class="glyphicon glyphicon-remove"></span>
              Detalles
            </a>
            
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {!! $data->render() !!}
    </div>
  </div>

@stop
