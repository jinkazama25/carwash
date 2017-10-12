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
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Direccion</th>
			<th>Dni</th>
            <th>Rol</th>
            <th>Email</th>
			<th>operaciones</th>

		</thead>
		@foreach($usuarios as $user)

		<tbody>
			<td>{{$user->nombre_usuario}}</td>
			<td>{{$user->apellido_usuario}}</td>
			<td>{{$user->direccion_usuario}}</td>
			<td>{{$user->dni}}</td>
			<td>{{$user->rol}}</td>
			<td>{{$user->email}}</td>
			<td>
			<a class="btn btn-primary"  href="{{Url('usuario/edit',$parameter=$user->id)}}"/>Editar</a> 
			<a class="btn btn-primary"  href="{{Url('usuario/destroy',$parameter=$user->id)}}"/>Eliminar</a>
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