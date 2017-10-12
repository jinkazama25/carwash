@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	
 <form  action="{{Url('lavado/update',$parameter=$lav->id)}}" method="post">
 
 <div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="fecha_lavado">Fecha_lavado</label><br>
                <input type="date" class="control-form" name="fecha_lavado" value="{{$lav->fecha_lavado}}">
    </div>
	 <div class="form-group">
               <label for="monto">Monto</label><br>
                <input type="text" class="control-form" name="monto" value="{{$lav->monto}}">
            </div>
            <div class="form-group">
               <label for="id_carro">Id_lavado</label><br>
                <input type="text" class="control-form" name="id_carro" value="{{$lav->id_carro}}">
            </div>
            
            
            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </div>
</body>
</html>
@endsection