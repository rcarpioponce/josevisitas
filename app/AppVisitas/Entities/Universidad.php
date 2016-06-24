<?php
namespace AppVisitas\Entities;
class Universidad extends \Eloquent{
	protected $table = 'universidades';
	protected $primarykey = 'Cod_Universiad';
	protected $fillable = array('Cod_Universiad','Descripcion');
	
}