<h1>Lista De Lavados Del Día</h1>
	<table class="table">
		<thead>
		<tr>
			<th>total</th>
			<th>nombre</th>
			<th>fecha</th>
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
  
