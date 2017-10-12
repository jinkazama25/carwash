@extends('layouts.admin')
    @section('content')
    <form id="frmCarroCrear" action="{{Url('carro/store')}}" method="post">
    <div class="row">
       <div class="col-md-3">
            <div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="placa">Placa</label><br>
                <input type="text" id="placa" class="control-form" name="placa">
            </div>
            <div class="form-group">
               <label for="marca">Marca</label><br>
                <input type="text" id="marca" class="control-form" name="marca">
            </div>
            <div class="form-group">
               <label for="modelo">Modelo</label><br>
                <input type="text" class="control-form" name="modelo">
            </div>
            <div class="form-group">
              <label for="duenio">Dueño</label><br>
               <select name="id_cliente" id="duenio" class="selectpicker" data-live-search="true">
                 @foreach($clientes as $cli)
                   <option  value="{{$cli->id}}">
                     {{$cli->nombre_cliente}}
                     </option>
                      @endforeach
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="button" value="Guardar" onclick="validarRegistros()">
                <a href="\carro" class="btn btn-danger">Cancelar </a>
            </div>
        </div>
    </div>
    </form>
@endsection
<script>
    function validarRegistros()

    {
    var mensajeGeneral='';
    mensajeGeneral+=validarPlaca($('#placa').val(),'placa',true);
    mensajeGeneral+=validarMarca($('#marca').val(),'marca',true);
    mensajeGeneral+=validarModelo($('#modelo').val(),'modelo',true);
    
    if(mensajeGeneral!='')
        {
            alert(mensajeGeneral);
            return;
        }
        $('#frmCarroCrear').submit();
             
    }
    
    function validarPlaca(placa,texto,verdadero)
    {
        return '';
          
    }
    
    function validarMarca(marca,texto,verdadero)
    {
        var patron=/^[a-z ,.'-]+$/i;
        var validar=patron.test(marca);
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo texto';
        }
        return '';
    }
    function validarModelo(modelo,texto,verdadero)
    {
        
        return '';
        
    }
</script>

