<?php
namespace AppVisitas\Entities;
class UnivPostuladas extends \Eloquent{
	protected $table = 'universidades_postuladas';
	protected $primarykey = 'Cod_Universidad';
	protected $fillable = array('Cod_Universidad','Cod_Persona','Id_Visita');
	public $timestamps  = false;
}