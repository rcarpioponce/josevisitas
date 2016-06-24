<?php
namespace AppVisitas\Entities;
class Distrito extends \Eloquent{
	protected $table = 'distrito';
	protected $primarykey = 'Cod_Distrito';
	protected $fillable = array('Cod_Distrito','Descripcion');
	
}