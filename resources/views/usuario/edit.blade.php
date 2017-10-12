@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form  action="{{Url('usuario/update',$parameter=$user->id)}}" method="post">
	<div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="nombre_usuario">Nombre</label><br>
                <input type="text" class="control-form" name="nombre_usuario" value="{{$user->nombre_usuario}}">
    </div>
	 <div class="form-group">
               <label for="apellido_usuario">Apellido</label><br>
                <input type="text" class="control-form" name="apellido_usuario" value="{{$user->apellido_usuario}}">
            </div>
            <div class="form-group">
               <label for="direccion_usuario">Direccion</label><br>
                <input type="text" class="control-form" name="direccion_usuario" value="{{$user->direccion_usuario}}">
            </div>
            <div class="form-group">
               <label for="dni">Dni</label><br>
                <input type="text" class="control-form" name="dni" value="{{$user->dni}}">
            </div>
            <div class="form-group">
               <label for="rol">Rol</label><br>
                <select class="form-control" name="rol" value="{{$user->rol}}">
                    <option value="administrador">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select >
            </div>
            <div class="form-group">
               <label for="email">Email</label><br>
                <input type="text" class="control-form" name="email"  value="{{$user->email}}">
            </div>
            <div class="form-group">
               <label for="password">Password</label><br>
                <input type="password" class="control-form" name="password"  value="{{$user->password}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </div>
</form>
</body>
</html>
@endsection