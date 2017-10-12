@extends('layouts.admin')
    @section('content')
    <form id="frmClienteCrear" action="{{Url('cliente/store')}}" method="post">
    <div class="row">
       <div class="col-md-3">
            <div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="nombre_cliente">Nombre</label><br>
                <input type="text" class="control-form" id="nombre_cliente" name="nombre_cliente">
            </div>
            <div class="form-group">
               <label for="apellido_cliente">Apellidos</label><br>
                <input type="text" class="control-form" id="apellido_cliente" name="apellido_cliente">
            </div>
            <div class="form-group">
               <label for="direccion_cliente">Direccion</label><br>
                <input type="text" class="control-form" id="direccion_cliente" name="direccion_cliente">
            </div>
            <div class="form-group">
               <label for="telefono">Telefono</label><br>
                <input type="text" class="control-form" id="telefono" name="telefono">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="button" value="Guardar" onclick="validarRegistros()">
                <a href="\cliente" class="btn btn-danger">Cancelar </a>
            </div>
        </div>
    </div>
    </form>
@endsection
<script>
    function validarRegistros()

    {
    var mensajeGeneral='';
    mensajeGeneral+=validarNombre($('#nombre_cliente').val(),'nombre',true);
    mensajeGeneral+=validarApellido($('#apellido_cliente').val(),'apellido',true);
    mensajeGeneral+=validarTelefono($('#telefono').val(),'telefono',true);
    
    if(mensajeGeneral!='')
        {
            alert(mensajeGeneral);
            return;
        }
        $('#frmClienteCrear').submit();
             
    }
    
    function validarNombre(nombre,texto,verdadero)
    {
        var patron=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
        
        var validar=patron.test(nombre);
        if(verdadero&&!validar)
            {
                return 'el campo \"'+texto+'\" solo texto';
            }
        return '';
          
    }
    
    function validarApellido(apellido,texto,verdadero)
    {
        var patron=/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
        var validar=patron.test(apellido);
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo texto';
        }
        return '';
    }
    function validarTelefono(telefono,texto,verdadero)
    {
        if(telefono.length=='9'){
        var patron=/^([0-9])*$/;
        var validar=patron.test(telefono);
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo numeros solo 8 numeros';
        }
        return '';
        }
        else{ return 'el campo telefono solo 9 numeros';}
    }

</script>
