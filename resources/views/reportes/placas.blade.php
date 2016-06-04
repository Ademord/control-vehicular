@extends('layouts.default')
@section('content')
	<h1>Placas Vistas</h1>
	<canvas id="reporte-placas" width="600" height="200"></canvas>
@stop

@section('footer')
	<script src="{{ asset('js/vendor/chart.min.js') }}"></script>

	<script>
		(function(){
			var ctx = document.getElementById('reporte-placas').getContext('2d');
			var chart = new Chart(ctx, {
				type: 'line',
				data: {
					labels : {!! json_encode($dates) !!},
					datasets: [{
						label: 'Placas vistas',
						data: {!! json_encode($plates) !!}
					}]
				}
			});
		})();
	</script>
@stop
