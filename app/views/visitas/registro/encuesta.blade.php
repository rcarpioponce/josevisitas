<div class="form-group">
	<label>Actualmente</label>
</div>
<div class="form-group">
	<label>El pago de mis estudios en la universidad seran asumidos por</label>
	<div class="radio"> <label> <input type="radio"> Mi </label> </div>
	<div class="radio"> <label> <input type="radio"> Mis Padres </label> </div>
	<div class="radio"> <label> <input type="radio"> Otro Familiar </label> </div>
</div>
<div>
	<label>Para postular a una universidad que universidades visitaste</label>
	<select class="form-control" multiple="">
		@foreach($arUniversidades as $u)
		<option value="{{$u['Cod_Universidad']}}">{{$u['Descripcion']}}</option>
		@endforeach
	</select>
</div>
<div class="form-group">
	<label>Antes de postular a la UPCI, ¿Postulaste a otras universidades?</label>
	<select class="form-control">
		<option value="1">Si</option>
		<option value)"2">No</option>
	</select>
</div>
<div class="form-group">
	<label for="">Temas de interes</label>
	<div class="checkbox"> <label> <input type="checkbox"> Actualidad </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Futbol </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Cocina </label> </div>
</div>
<div class="form-group">
	<label for="">Con quien consultaste para estudiar en la UPCI</label>
	<div class="checkbox"> <label> <input type="checkbox"> Padres </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Amigos </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Hermanos </label> </div>
</div>
<div class="form-group">
	<label for="">Como te preparaste para estudiar en la UPCI</label>
	<div class="checkbox"> <label> <input type="checkbox"> En una academia </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Solo </label> </div>
	<div class="checkbox"> <label> <input type="checkbox"> Con mis amigos </label> </div>
</div>
