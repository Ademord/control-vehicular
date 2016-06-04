{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-right','role'=>'search'])  !!}
 
<div class="input-group custom-search-form">
	{!! Form::input('search', 'q', null, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
    </span>
</div>
{!! Form::close() !!}