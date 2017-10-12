@extends('layouts.admin')

@section('content')
@if(Session::has('massage'))
		<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{Session::get('massage')}}
</div>
	@endif
  <h1>Lista De Lavados Del Día</h1>
	<table class="table">
		<thead>
		<tr>
			<th>fecha</th>
			<th>Monto</th>
			<th>Nombre</th>
			<th>Apellidos</th>
		</tr>
		</thead>
		<tbody>
		@foreach($fecha as $lav)
			<tr>
		
			<td>{{$lav->fecha_lavado}}</td>	
			<td>{{$lav->monto}}</td>
			<td>{{$lav->nombre_usuario}}</td>
			<td>{{$lav->apellido_usuario}}</td>
			</tr>	
		</tbody>
		@endforeach
	</table>
  
@endsection