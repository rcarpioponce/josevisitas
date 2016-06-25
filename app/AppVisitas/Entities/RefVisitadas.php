<?php
namespace AppVisitas\Entities;
class RefVisitadas extends \Eloquent{
	protected $table = 'referencias_visitadas';
	protected $primarykey = 'Cod_Referencia';
	protected $fillable = array('Cod_Referencia','Cod_persona','Id_Visita');
	public $timestamps  = false;
}