@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form  action="{{Url('cliente/update',$parameter=$cli->id)}}" method="post">
	<div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="nombre_cliente">Nombre</label><br>
                <input type="text" class="control-form" name="nombre_cliente" value="{{$cli->nombre_cliente}}">
    </div>
	 <div class="form-group">
               <label for="apellido_cliente">Apellidos</label><br>
                <input type="text" class="control-form" name="apellido_cliente" value="{{$cli->apellido_cliente}}">
            </div>
            <div class="form-group">
               <label for="direccion_cliente">Direccion</label><br>
                <input type="text" class="control-form" name="direccion_cliente" value="{{$cli->direccion_cliente}}">
            </div>
            <div class="form-group">
               <label for="telefono">Telefono</label><br>
                <input type="text" class="control-form" name="telefono" value="{{$cli->telefono}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </div>
</form>
</body>
</html>
@endsection