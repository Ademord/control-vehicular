<div class="col-lg-7">
  <div class="form-group">
    
    {!! Form::label('ip', 'Nombres', ['for' => 'ip']) !!}
    <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>

      {!! Form::label('ip', 'Apellidos', ['for' => 'ip']) !!}
      <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>

     {!! Form::label('ip', 'Telefono', ['for' => 'ip']) !!}
    <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>

    {!! Form::label('ip', 'Direccion', ['for' => 'ip']) !!}
    <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
    
    {!! Form::label('ip', 'Identificacion', ['for' => 'ip']) !!}
    <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
    
    <br>
  {!! link_to_route('camara.index', 'Cancelar', null, ['class' => 'btn btn-danger']) !!}
  {!! Form::submit('Guardar', [
                    'class' => 'btn btn-info pull-right', 
                    'id' => 'guardar', 
                    'required' => 'required']) 
  !!}
</div>