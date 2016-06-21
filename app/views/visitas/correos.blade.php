@extends('layouts.layout')
@section('titulo')
Correos
@stop
@section('work_area')
<div class="container-fluid">
	<form>
		<div class="form-group">
			<label>Carrera</label>
			<select class="form-control">
				<option>Seleccione Carrera</option>
			</select>
		</div>
		<div class="form-group">
			<label>Correo</label>
			<select name="" class="form-control">
				<option value="">Seleccione Correo</option>
			</select>
		</div>
		<div class="form-group">
			<label>Asunto</label>
			<input type="text" name="" class="form-control">
		</div>
		<div class="form-group">
			<label>Mensaje</label>
			<textarea  id="editor1" class="form-control textarea"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Enviar Correos" class="form-control btn btn-primary">
		</div>
	</form>
</div>
@stop