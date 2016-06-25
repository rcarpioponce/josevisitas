@extends('layouts.layout')
@section('titulo')
Lista de Visitantes
@stop
@section('work_area')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Nombres</th>
			<th>Carrera</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $d)
		<tr>
			<td>{{$d->Paterno}}</td>
			<td>{{$d->Materno}}</td>
			<td>{{$d->Nombres}}</td>
			<td>{{$d->carrera}}</td>
			<td>{{$d->Fec_Reg}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop