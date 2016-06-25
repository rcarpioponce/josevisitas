<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\Persona;
use AppVisitas\Entities\Visitas;
use AppVisitas\Entities\UnivPostuladas;
use AppVisitas\Entities\UnivVisitadas;
use AppVisitas\Entities\RefVisitadas;
use AppVisitas\Entities\Motivo;
class VisitaRepo{
	public function saveVisita(){
		$inputs = \Input::all();
		//return dd($inputs);
		$this->idPersona = $this->savePersona();
		$this->idVisita = $this->saveTableVisita($this->idPersona['id']);
		$this->saveUnivPostuladas($this->idPersona['id'],$this->idVisita['id']);
		$this->saveUnivVisitadas($this->idPersona['id'],$this->idVisita['id']);
		$this->saveRefVisitadas($this->idPersona['id'],$this->idVisita['id']);
		$this->saveMotivo($this->idPersona['id'],$this->idVisita['id']);
		return \Redirect::to('registro');
		//return $this->idVisita;
	}
	private function savePersona(){
		$inputs = \Input::all();
		$arPersona = $inputs['persona'];
		return Persona::create($arPersona);
	}
	private function saveTableVisita($idPersona){
		$inputs = \Input::all();
		$inputs['visita']['Cod_persona'] = $idPersona;
		$inputs['visita']['Fec_Reg'] = date('Y-m-d H:i:s');
		$arVisitas = $inputs['visita'];
		//return $arVisitas;
		return Visitas::create($arVisitas);
	}
	private function saveUnivVisitadas($idPersona,$idVisita){
		$inputs = \Input::all();
		$arUnivs = $inputs['univ_visitadas'];
		foreach($arUnivs as $univ){
			$array = array('Cod_Persona' => $idPersona, 'Cod_Universidad' => $univ , 'Id_Visita'=> $idVisita);
			UnivVisitadas::create($array);	
		}
	}
	private function saveUnivPostuladas($idPersona,$idVisita){
		$inputs = \Input::all();
		$arUnivs = $inputs['univ_postuladas'];
		foreach($arUnivs as $univ){
			$array = array('Cod_Persona' => $idPersona, 'Cod_Universidad' => $univ , 'Id_Visita'=> $idVisita);
			UnivPostuladas::create($array);	
		}
	}
	private function saveRefVisitadas($idPersona,$idVisita){
		$inputs = \Input::all();
		$arUnivs = $inputs['ref_visitadas'];
		foreach($arUnivs as $ref){
			$array = array('Cod_persona' => $idPersona, 'Cod_referencia' => $ref , 'Id_Visita'=> $idVisita);
			\DB::table('referencias_visitadas')->insert($array);	
		}
	}
	private function saveMotivo($idPersona,$idVisita){
		$inputs = \Input::all();
		$arUnivs = $inputs['motivo_visita'];
		foreach($arUnivs as $motivo){
			$array = array('Cod_persona' => $idPersona, 'Cod_Motivo' => $motivo , 'Id_Visita'=> $idVisita);
			//return $array;
			Motivo::create($array);	
		}
	}	
	public function listaVisita(){
		$arVisitas = \DB::table('persona')
							->join('visita','persona.Cod_Persona','=','visita.Cod_Persona')
							->join('carreras','visita.Cod_carrera','=','carreras.Cod_carrera')
							->select(\DB::raw('persona.*'),'visita.Fec_Reg',\DB::raw('carreras.Descripcion as carrera'))->get();
		//return $arVisitas[0]->Fec_Reg;
		return \View::make('visitas.lista',array('data'=>$arVisitas));
	}
}