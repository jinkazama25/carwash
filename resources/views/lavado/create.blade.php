@extends('layouts.admin')
    @section('content')
    <form action="{{Url('lavado/store')}}" method="post">
    <div class="row">
       <div class="col-md-3">
            <div class="form-group">
             {{csrf_field()}}
               <label for="fecha_lavado">Fecha lavado</label><br>
                <input type="date" class="control-form" name="fecha_lavado">
            </div>
            <div class="form-group">
               <label for="monto">Monto</label><br>
                <input type="text" class="control-form" name="monto">
            </div>
            <div class="form-group">
              <label for="carro">Carro</label><br>
               <select name="id_carro" class="selectpicker" data-live-search="true">
                    @foreach($carros as $car)
                   <option  value="{{$car->id}}">
                     {{$car->placa."--".$car->modelo}}
                     </option>
                      @endforeach
                </select>
            </div>
            <div class="form-group">
               <label for="usuario">Usuario</label><br>
               <select name="id_usuario" class="selectpicker" data-live-search="true">
                 @foreach($usuarios as $user)
                   <option  value="{{$user->id}}">
                     {{$user->nombre_usuario."--".$user->apellido_usuario}}
                     </option>
                      @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar</button>
                <a href="\lavado" class="btn btn-danger">Cancelar </a>
            </div>
        </div>
    </div>
    </form>
@endsection
