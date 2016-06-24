<?php
namespace AppVisitas\Entities;
class Carrera extends \Eloquent{
	protected $table = 'carreras';
	protected $primarykey = 'Cod_carrera';
	protected $fillable = array('Cod_carrera','Descripcion');
	
}