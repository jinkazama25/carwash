@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	
 <!--<input type="text" class="control-form" name="placa" value="{{$car->placa}}">-->
 <form  action="{{Url('carro/update',$parameter=$car->id)}}" method="post">
 <div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="placa">Placa</label><br>
                <input type="text" class="control-form" name="placa" value="{{$car->placa}}">
    </div>
	 <div class="form-group">
               <label for="marca">Marca</label><br>
                <input type="text" class="control-form" name="marca" value="{{$car->marca}}">
            </div>
            <div class="form-group">
               <label for="modelo">Modelo</label><br>
                <input type="text" class="control-form" name="modelo" value="{{$car->modelo}}">
            </div>
             <div class="form-group">
              <label for="duenio">Dueño</label><br>
               <select name="id_cliente" class="selectpicker" data-live-search="true">
                 @foreach($listaCliente as $cli)
                    @if($car->id_cliente==$cli->id)
                             <option  value="{{$car->id_cliente}}" selected>
                             {{$cli->nombre_cliente}}
                             </option>
                         @endif
                         else
                            @if($car->id_cliente!=$cli->id)
                             <option  value="{{$cli->id}}" >
                             {{$cli->nombre_cliente}}
                             </option>
                             @endif
                      @endforeach
                </select>
            </div> 
            <div class="form-group">
                <input type="hidden" class="control-form" name="id_usuario" value="{{$car->id_usuario}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </div>
</body>
</html>
@endsection