@extends('layouts.layout')
@section('titulo')
Registro del Visitante
@stop
@section('work_area')
<div class="container-fluid">
	<form>
		<div class="row">
			<h1>Datos Personales</h1>
			<div class="form-group col-lg-4">
				<label>Apellido Paterno</label>
				<input type="text" name="ape_paterno" class="form-control">
			</div>
			<div class="form-group col-lg-4">
				<label>Apellido Materno</label>
				<input type="text" name="ape_materno" class="form-control">
			</div>
			<div class="form-group col-lg-4">
				<label>Nombres</label>
				<input type="text" name="nombres" class="form-control">
			</div>						
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Sexo</label>
				<select class="form-control" name="sexo">
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label>Edad</label>
				<input type="text" name="edad" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Distrito</label>
				<select class="form-control" name="distrito">
					<option value="">Seleccione</option>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Celular</label>
				<input type="text" name="celular" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Teléfono</label>
				<input type="text" name="telefono" class="form-control">
			</div>						
		</div>				
		<div class="form-group">
			<label>Dirección de casa</label>
			<input type="text" name="direccion" class="form-control">
		</div>
		@include('visitas.registro.academicos')
		<div class="form-group">
			<input type="submit" value="Registrar" class="form-control btn btn-primary">
		</div>
	</form>
</div>
@stop