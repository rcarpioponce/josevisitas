<?php
namespace AppVisitas\Entities;
class Motivo extends \Eloquent{
	protected $table = 'motivo_visita';
	protected $primarykey = 'Cod_Motivo';
	protected $fillable = array('Cod_Motivo','Cod_persona','Id_Visita');
	public $timestamps  = false;
}