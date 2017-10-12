@extends('layouts.admin')

@section('content')
<h1>MEJOR TRABAJADOR</h1>
	<table class="table">
		<thead>
		<tr>
			<th>Cantidad</th>
			<th>Total</th>
			<th>Nombre</th>
		
		</tr>
		</thead>
		<tbody>
		@foreach($users as $lis)
		<tr>

			<td>{{$lis->cantidad}}</td>
			<td>{{$lis->total}}</td>
			<td>{{$lis->nombre_usuario}}</td>
		</tr>
		</tbody>
		@endforeach
		  
</table>
@endsection