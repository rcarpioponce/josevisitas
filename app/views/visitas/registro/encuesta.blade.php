<div class="form-group">
	<label>Actualmente</label>
	<div class="radio"> <label> <input type="radio" value="Solo estudio" name="visita[Situacion_Actual]"> Solo estudio </label> </div>
	<div class="radio"> <label> <input type="radio" value="Estudio y Trabajo" name="visita[Situacion_Actual]"> Estudio y Trabajo </label> </div>
</div>
<div class="form-group">
	<label>El pago de mis estudios en la universidad seran asumidos por</label>
	<div class="radio"> <label> <input type="radio" value="1" name="visita[Cod_pago_estudio]"> Mis padres </label> </div>
	<div class="radio"> <label> <input type="radio" value="2"  name="visita[Cod_pago_estudio]"> La empresa donde trabajo </label> </div>
</div>
<div>
	<label>Para postular a una universidad que universidades visitaste</label>
	<select class="form-control" multiple="" name="univ_visitadas[]">
		@foreach($arUniversidades as $u)
		<option value="{{$u['Cod_Universidad']}}">{{$u['Descripcion']}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label>Antes de postular a la UPCI, ¿Postulaste a otras universidades, a cuales?</label>
	<select class="form-control" multiple="" name="univ_postuladas[]">
		@foreach($arUniversidades as $u)
		<option value="{{$u['Cod_Universidad']}}">{{$u['Descripcion']}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label for="">Temas de interes</label>
	<div class="checkbox"> <label> <input type="checkbox" value="1" name="ref_visitadas[]"> Actualidad </label> </div>
	<div class="checkbox"> <label> <input type="checkbox" value="2" name="ref_visitadas[]"> Futbol </label> </div>
	<div class="checkbox"> <label> <input type="checkbox" value="3" name="ref_visitadas[]"> Cocina </label> </div>
</div>
<div class="form-group">
	<label for="">Con quien consultaste para estudiar en la UPCI</label>
	<div class="checkbox"> <label> <input type="checkbox" name="motivo_visita[]" value="1"> Padres </label> </div>
	<div class="checkbox"> <label> <input type="checkbox" name="motivo_visita[]" value="2"> Amigos </label> </div>
	<div class="checkbox"> <label> <input type="checkbox" name="motivo_visita[]" value="3"> Hermanos </label> </div>
</div>
<div class="form-group">
	<label for="">Como te preparaste para estudiar en la UPCI</label>
	<div class="radio"> <label> <input type="radio" value="1" name="visita[Cod_pos_prepa]"> En una academia </label> </div>
	<div class="radio"> <label> <input type="radio" value="2" name="visita[Cod_pos_prepa]"> Con mis amigos </label> </div>
</div>
