<?php
namespace AppVisitas\Entities;
class Cargo extends \Eloquent{
	protected $table = 'cargo';
	protected $primarykey = 'Cod_cargo';
	protected $fillable = array('Cod_cargo','Descripcion');
	
}