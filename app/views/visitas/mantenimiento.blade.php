@extends('layouts.layout')
@section('titulo')
Mantenimiento
@stop
@section('work_area')
<div class="container-fluid">
	<form method="post">
		<div class="row">		
			<div class="col-lg-6 form-group">
				<label>Apellidos</label>
				<input type="text" name="Apellidos" class="form-control">
			</div>
			<div class="col-lg-6 form-group">
				<label>Nombres</label>
				<input type="text" name="Nombres" class="form-control">
			</div>
		</div>
<!-- 		<div class="row">
	<div class="col-lg-6 form-group">
		<label>Teléfono</label>
		<input type="text" name="" class="form-control">
	</div>
	<div class="col-lg-6 form-group">
		<label>Correo</label>
		<input type="text" name="" class="form-control">
	</div>
</div> -->
		<div class="row">
		<div class="col-lg-4 form-group">
			<label>Usuario</label>
			<input type="text" name="Login" class="form-control">
		</div>
		<div class="col-lg-4 form-group">
			<label>Contraseña</label>
			<input type="password" name="Clave" class="form-control">
		</div>
		<div class="col-lg-4 form-group">
			<label>Tipo de Usuario</label>
			<select class="form-control" name="Cod_Cargo">
				<option value="">Seleccione Tipo</option>
				@foreach($arCargo as $c)
				<option value="{{$c['Cod_Cargo']}}">{{$c['Descripcion']}}</option>
				@endforeach
			</select>
		</div>												
		</div>
		<div class="form-group">
			<input type="submit" value="Crear Usuario" class="form-control btn btn-primary">
		</div>
	</form>

	<table class="table table-striped" style="margin-top:40px">
		<thead class="bg-warning">
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>Usuario</th>
			<th>Tipo de Usuario</th>
		</thead>
		<tbody>
			@foreach($arUsuarios as $us)
			<tr>
				<td>{{$us->Apellidos}}</td>
				<td>{{$us->Nombres}}</td>
				<td>{{$us->Login}}</td>
				<td>{{$us->Descripcion}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop