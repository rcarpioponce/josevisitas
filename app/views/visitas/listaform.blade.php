@extends('layouts.layout')
@section('titulo')
Editar de Visitante
@stop
@section('work_area')
<form method="POST">
	<div class="form-group">
		<label for="">Nombres</label>
		<input type="text" class="form-control" name="nombres" required value="{{$persona[0]->Nombres}}">
	</div>
	<div class="form-group">
		<label for="">Ap Paterno</label>
		<input type="text" class="form-control" name="paterno" required  value="{{$persona[0]->Paterno}}">
	</div>
	<div class="form-group">
		<label for="">Ap Materno</label>
		<input type="text" class="form-control" name="materno" required  value="{{$persona[0]->Materno}}">
	</div>
	<div class="form-group">
		<label for="">Telefono</label>
		<input type="text" class="form-control" name="telefono" required  value="{{$persona[0]->Telefono}}">
	</div>
	<div class="form-group">
		<label for="">Celular</label>
		<input type="text" class="form-control" name="celular" required  value="{{$persona[0]->Celular}}">
	</div>
	<div class="form-group">
		<label for="">Correo</label>
		<input type="text" class="form-control" name="correo" required  value="{{$persona[0]->Correo}}">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Guardar">
	</div>
</form>
@stop