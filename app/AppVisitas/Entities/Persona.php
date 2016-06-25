<?php
namespace AppVisitas\Entities;
class Persona extends \Eloquent{
	protected $table = 'Persona';
	protected $primarykey = 'Cod_persona';
	protected $fillable = array(
								'Nombres',
								'Domicilio',
								'Correo',
								'Telefono',
								'Celular',
								'Edad',
								'Sexo',
								'Materno',
								'Paterno',
								'Cod_Distrito'
								);
	public $timestamps  = false;

	
}