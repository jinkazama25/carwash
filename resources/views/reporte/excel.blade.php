<h1>Lista De Lavados Del Día</h1>
	<table class="table">
		<thead>
		<tr>
			<th>id</th>
			<th>fecha</th>
			<th>Monto</th>
		</tr>
		</thead>
		<tbody>
		@foreach($lista as $lis)
		<tr>
			<td>{{$lis->total}}</td>
			<td>{{$lis->nombre_usuario}}</td>	
			<td>{{$lis->fecha_lavado}}</td>
		</tr>
		</tbody>
		@endforeach
	</table>
  <p>Monto Total dia:$ <span class="btn btn-danger">{{$monto}}<span></p>
  
