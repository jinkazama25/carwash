@extends('layouts.admin')

@section('content')
<h1>Rango de fechas</h1>
	<table class="table">
		<thead>
		<tr>
			<th>fecha</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Monto</th>
		</tr>
		</thead>
		<tbody>
		@foreach($listaRango as $lis)
		<tr>

			<td>{{$lis->fecha_lavado}}</td>
			<td>{{$lis->nombre_usuario}}</td>
			<td>{{$lis->apellido_usuario}}</td>
			<td>{{$lis->suma}}</td>
		</tr>
		</tbody>
		@endforeach
		  
</table>
<p>Monto Total dia:$ <span class="btn btn-danger">{{$sumaTotal}}<span></p>
@endsection
