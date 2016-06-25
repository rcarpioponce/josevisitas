@extends('layouts.layout')
@section('titulo')
Registro del Visitante
@stop
@section('work_area')
<div class="container-fluid">
	<form method="post">
		<div class="row">
			<h1>Datos Personales</h1>
			<div class="form-group col-lg-4">
				<label>Apellido Paterno</label>
				<input type="text" name="persona[Materno]" class="form-control">
			</div>
			<div class="form-group col-lg-4">
				<label>Apellido Materno</label>
				<input type="text" name="persona[Paterno]" class="form-control">
			</div>
			<div class="form-group col-lg-4">
				<label>Nombres</label>
				<input type="text" name="persona[Nombres]" class="form-control">
			</div>						
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Sexo</label>
				<select class="form-control" name="persona[Sexo]">
					<option value="M">Masculino</option>
					<option value="F">Femenino</option>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label>Edad</label>
				<input type="text" name="persona[Edad]" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Distrito</label>
				<select class="form-control" name="persona[Cod_Distrito]">
					<option value="">Seleccione</option>
					@foreach($arDistritos as $d)
					<option value={{$d['Cod_Distrito']}}"">{{$d['Descripcion']}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label>Correo Electrónico</label>
				<input type="email" name="persona[Correo]" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Celular</label>
				<input type="text" name="persona[Celular]" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label>Teléfono</label>
				<input type="text" name="persona[Telefono]" class="form-control">
			</div>						
		</div>				
		<div class="form-group">
			<label>Dirección de casa</label>
			<input type="text" name="persona[Domicilio]" class="form-control">
		</div>
		@include('visitas.registro.academicos')
		@include('visitas.registro.encuesta')
		<div class="form-group">
			<input type="submit" value="Registrar" class="form-control btn btn-primary">
		</div>
	</form>
</div>
@stop