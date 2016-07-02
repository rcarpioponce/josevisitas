<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\Distrito;
use AppVisitas\Entities\Carrera;
use AppVisitas\Entities\Universidad;
use AppVisitas\Entities\Visitas;
use AppVisitas\Entities\Persona;
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
	public function editarForm($cod){
		$visita = \DB::table('visita')->select(\DB::raw('visita.*'))->where('Id_Visita','=',$cod)->get();
		$idP = $visita[0]->Cod_persona;
		//return dd($idP);
		$persona = \DB::table('persona')->select(\DB::raw('persona.*'))->where('Cod_persona','=',$idP)->get();
		return \View::make('visitas.listaform', array('persona' => $persona));
	}
	public function saveFormVisita($cod){
		$inputs = \Input::All();
		$visita = \DB::table('visita')->select(\DB::raw('visita.*'))->where('Id_Visita','=',$cod)->get();
		$idP = $visita[0]->Cod_persona;
		$persona = \DB::table('persona')->where('Cod_persona','=',$idP)
						->update(array('Nombres' => $inputs['nombres'],'Correo' => $inputs['correo'],'Telefono' => $inputs['telefono'],'Celular' => $inputs['celular'],'Materno' => $inputs['materno'],'Paterno' => $inputs['paterno']));
		return \Redirect::to('lista');
	}
}
