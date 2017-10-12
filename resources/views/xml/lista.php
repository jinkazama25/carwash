@extends('layouts.admin')

@section('content')
@if(Session::has('massage'))
		<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{Session::get('massage')}}
</div>
	@endif
  <h1>Lista De Lavados Del Día</h1>
	<table class="table">
		<<h1>hola mundo</h1>
	</table>
  
@endsection