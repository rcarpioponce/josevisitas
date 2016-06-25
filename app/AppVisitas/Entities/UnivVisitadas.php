<?php
namespace AppVisitas\Entities;
class UnivVisitadas extends \Eloquent{
	protected $table = 'universidades_visitadas';
	protected $primarykey = 'Cod_Universidad';
	protected $fillable = array('Cod_Universidad','Cod_Persona','Id_Visita');
	public $timestamps  = false;
}