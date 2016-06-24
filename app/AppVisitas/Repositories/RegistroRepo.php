<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\Distrito;
use AppVisitas\Entities\Carrera;
use AppVisitas\Entities\Universidad;
class RegistroRepo{

	public function index(){
		$arDistritos 	= Distrito::all();
		$arCarreras 	= Carrera::all();
		$data			= array(
							'arDistritos' 	=> $arDistritos,
							'arCarreras' 	=> $arCarreras,
							'arAnios'		=> $this->generateAnios(),
							'arUniversidades' => Universidad::all()
							);
		return \View::make('visitas.registro',$data);
	}
	public function generateAnios(){
		$minimo = 1960;
		$maximo = intval(date('Y'));
		$arReturn = array();
		$actual = $minimo;
		while($actual <= $maximo){
			$arReturn[] = $actual;
			$actual++;
		}
		return $arReturn;

	}
}
