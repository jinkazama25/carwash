@extends('layouts.admin')
@section('content')
<!DOCTYPE html>

        <form class="" action="{{Url('reporte/rangoFechas')}}" method="post">
          <div class="row">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="fechaInicio">Fecha Inicio</label>
                <input type="date"id="fechaInicio"  name="fechaInicio" value="">
            </div>
            <div class="form-group">
              <label for="fechaFin">Fecha Fin</label>
              <input type="date" id="fechaFin"  name="fechaFin" value="">
            </div>
            <div class="form-group">
              <button class="btn btn-primary">Consulta</button>
            
            </div>

          </div>
        </form>

@endsection
