@extends('layouts.layout')
@section('titulo')
Lista de Visitantes
@stop
@section('work_area')
<div class="row">
	<div class="col-lg-12">
		<form class="form-inline">
			<div class="form-group">
				<label for="">Carrera</label>
				<select class="form-control">
					<option value="">Seleccione...</option>
					@foreach($arCarrera as $c)
					<option value="{{$c['Cod_Carrera']}}">{{$c['Descripcion']}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Desde</label>
				<input type="text" name="" id="" class="form-control">
			</div>
			<div class="form-group">
				<label>Hasta</label>
				<input type="text" name="" id="" class="form-control">
			</div>
			<div class="form-group text-right">
				<a href="{{asset('lista/reporte')}}" class="btn btn-primary">Reporte en Excel</a>
			</div>			
		</form>
	</div>
</div>
<table class="table table-striped" style="margin-top:40px">
	<thead>
		<tr>
			<th>Ap. Paterno</th>
			<th>Ap. Materno</th>
			<th>Nombres</th>
			<th>Carrera</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Correo</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $d)
		<tr>
			<td>{{$d->Paterno}}</td>
			<td>{{$d->Materno}}</td>
			<td>{{$d->Nombres}}</td>
			<td>{{$d->carrera}}</td>
			<td>{{$d->Telefono}}</td>
			<td>{{$d->Celular}}</td>
			<td>{{$d->Correo}}</td>
			<td>{{$d->Fec_Reg}}</td>
			<td><a href="" class="btn btn-danger">Eliminar</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
<?php echo $data->links(); ?>
@stop