<hr>
<h1>Datos Académicos</h1>
<div class="form-group">
	<label>Carrera a la que postulas</label>
	<select name="visita[Cod_carrera]" class="form-control">
		<option value="">Seleccione</option>
		@foreach($arCarreras as $d)
		<option value={{$d['Cod_carrera']}}"">{{$d['Descripcion']}}</option>
		@endforeach		
	</select>
</div>
<div class="form-group">
	<label>Colegio en el que terminaste la secundaria</label>
	<input type="text" name="visita[Descripcion_de_Colegio]" class="form-control">
</div>
<div class="row">
	<div class="form-group col-lg-4">
		<label>El colegio es</label>
		<select name="visita[Tipo_Colegio]" class="form-control">
			<option value="N">Nacional</option>
			<option value="P">Privado</option>
		</select>
	</div>
		<div class="form-group col-lg-4">
		<label>El colegio es</label>
		<select name="visita[Turno]" class="form-control">
			<option value="M">Mañana</option>
			<option value="N">Noche</option>
		</select>
	</div>
	<div class="form-group col-lg-4">
		<label>Año en que acabaste la secundaria</label>
		<select name="visita[Secundaria_anio]" class="form-control">
			<option value="">Seleccione</option>
			@foreach($arAnios as $d)
			<option value={{$d}}"">{{$d}}</option>
			@endforeach			
		</select>
	</div>	
</div>