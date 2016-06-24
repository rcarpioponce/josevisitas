@extends('layouts.layout')
@section('titulo')
Correos
@stop
@section('work_area')
<div class="container-fluid">
	<form method="post">
		<div class="form-group">
			<label>Carrera</label>
			<select class="form-control">
				<option>Seleccione Carrera</option>
		@foreach($arCarreras as $d)
		<option value={{$d['Cod_Carrera']}}"">{{$d['Descripcion']}}</option>
		@endforeach				
			</select>
		</div>
		<div class="form-group">
			<label>Correo</label>
			<select name="correos" class="form-control">
				<option value="">Seleccione Correo</option>
			</select>
		</div>
		<div class="form-group">
			<label>Asunto</label>
			<input type="text" name="asunto" class="form-control">
		</div>
		<div class="form-group">
			<label>Mensaje</label>
			<textarea  id="editor1" name="mensaje" class="form-control textarea"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Enviar Correos" class="form-control btn btn-primary">
		</div>
	</form>
</div>
@stop