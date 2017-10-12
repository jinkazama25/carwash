@extends('layouts.admin')
    @section('content')
    <form id="frmUsuarioCrear" action="{{Url('usuario/store')}}" method="post">
    <div class="row">
       <div class="col-md-3">
            <div class="form-group">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
               <label for="nombre_usuario">Nombre</label><br>
                <input type="text" class="control-form" id="nombre_usuario" name="nombre_usuario">
            </div>
            
            <div class="form-group">
               <label for="apellido_usuario">Apellido</label><br>
                <input type="text" class="control-form" id="apellido_usuario" name="apellido_usuario">
            </div>
            <div class="form-group">
               <label for="direccion_usuario">Direccion</label><br>
                <input type="text" class="control-form" id="direccion_usuario" name="direccion_usuario">
            </div>
            <div class="form-group">
               <label for="dni">Dni</label><br>
                <input type="text" class="control-form" id="dni" name="dni">
            </div>
            <div class="form-group">
               <label for="rol">Rol</label><br>
                <select class="form-control" id="rol" name="rol">
                    <option value="administrador">Administrador</option>
                    <option value="empleado">Empleado</option>
                </select >
            </div>
            <div class="form-group">
               <label for="email">Email</label><br>
                <input type="text" class="control-form" id="email" name="email">
            </div>
            <div class="form-group">
               <label for="password">Password</label><br>
                <input type="password" class="control-form" id="password" name="password">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="button" value="Guardar" onclick="validarRegistros()">
                <button class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
    </form>
@endsection
<script>
    function validarRegistros()

    {
    var mensajeGeneral='';
    mensajeGeneral+=validarNombre($('#nombre_usuario').val(),'nombre',true);
    mensajeGeneral+=validarApellido($('#apellido_usuario').val(),'apellido',true);
  //  mensajeGeneral+=validarDireccion($('#direccion_usuario').val(),'direccion',true);
    mensajeGeneral+=validarDni($('#dni').val(),'dni',true);
    mensajeGeneral+=validarEmail($('#email').val(),'email',true);
        
    if(mensajeGeneral!='')
        {
            alert(mensajeGeneral);
            return;
        }
        $('#frmUsuarioCrear').submit();
             
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
    /*function validarDireccion(direccion,texto,verdadero)
    {
        var patron=/^[a-z ,.'-]+$/i;
        var validar=patron.test(direccion);
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo texto';
        }
        return '';
        
    }*/
    function validarDni(dni,texto,verdadero)
    {
        if(dni.length=='8'){
        var patron=/^([0-9])*$/;
        var validar=patron.test(dni);
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo numeros solo 8 numeros';
        }
        return '';
        }
    }
function validarEmail(email,texto,verdadero)
    {
        var patron = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        var validar=patron.test(email);
        
        
        if(verdadero&&!validar)
        {
            return 'el campo \"'+texto+'\" solo texto';
        }
        return '';
    }
</script>
