@extends('layouts.admin')

@section('content')
@if(Session::has('massage'))
		<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{Session::get('massage')}}
</div>
	@endif
    

	<table class="table">
		<thead>
			<th>Placa</th>
			<th>Marca</th>
            <th>Modelo</th>
            <th>Clientes</th>
			<th>opraciones</th>
		</thead>
		@foreach($carros as $car)

		<tbody>
			<td>{{$car->placa}}</td>
			<td>{{$car->marca}}</td>
			<td>{{$car->modelo}}</td>
			<td>{{$car->nombre_cliente." ".$car->apellido_cliente}}</td>
			<td>
			<a class="btn btn-primary"  href="{{Url('carro/edit',$car->id)}}"/>Editar</a> 
			<a class="btn btn-primary"  href="{{Url('carro/destroy',$parameter=$car->id)}}"/>Eliminar</a>
			<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
			</td>

		</tbody>
		@endforeach
	</table>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>
        </div>
        <div class="modal-body">
          <form action="">

          	<div class="form-group">
          	<label for="name">Codigo Cliente</label>
          		<input type="text" name="codigoCliente" class="form-control">
          	</div>

          	<div class="form-group">
          		<label for="Email">Nombre Cliente</label>
          		<input type="text" name="nombre" class="form-control">
          	</div>

          	<div class="form-group">
          		<label for="descripcion">Descripcion</label>
          		<input type="text" class="form-control" name="descripcion">
          	</div>

          	<div class="form-group">
          		<label for="extensionLogo">Extencion Logo</label>
          		<input type="text" class="form-control" name="extencionLogo">
          	</div>


          </form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary"data-dismiss="modal" >Guaradar Datos</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection