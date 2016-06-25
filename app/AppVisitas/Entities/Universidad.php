<?php
namespace AppVisitas\Entities;
class Universidad extends \Eloquent{
	protected $table = 'universidades';
	protected $primarykey = 'Cod_Universidad';
	protected $fillable = array('Cod_Universidad','Descripcion');
	
}