<?php
namespace AppVisitas\Entities;
class Visitas extends \Eloquent{
	protected $table = 'visita';
	protected $primarykey = 'Id_Visita';
	protected $fillable = array('Cod_persona',
								'Descripcion_de_Colegio',
								'Tipo_Colegio',
								'Turno',
								'Secundaria_anio',
								'Cod_carrera',
								'Observacion_Pago',
								'Situacion_Actual',
								'Cod_Tipo_Visita',
								'Cod_pago_estudio',
								'Fec_Mod',
								'Fec_Reg',
								'Cod_pos_prepa',
								'Cod_Usuario');
	public $timestamps  = false;

	
}