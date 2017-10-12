@extends('layouts.admin')

@section('content')
@if(Session::has('massage'))
		<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{Session::get('massage')}}
</div>
	@endif
  <h1>No existen datos con la fecha de hoy...</h1>
	<table class="table">

	</table>
  
@endsection