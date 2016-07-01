<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\Persona;
use AppVisitas\Entities\Visitas;
use AppVisitas\Entities\UnivPostuladas;
use AppVisitas\Entities\UnivVisitadas;
use AppVisitas\Entities\RefVisitadas;
use AppVisitas\Entities\Motivo;
use AppVisitas\Entities\Carrera;
class VisitaRepo{
	public function __construct(){
		$this->numxPages = 15;
	}
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
			Motivo::create($array);	
		}
	}
	public function getTabla(){
		$query = \DB::table('persona')
							->join('visita','persona.Cod_Persona','=','visita.Cod_Persona')
							->join('carreras','visita.Cod_carrera','=','carreras.Cod_carrera')
							->select(	'persona.Paterno',
										'persona.Materno',
										'persona.Nombres',
										\DB::raw('carreras.Descripcion as carrera'),
										'persona.Telefono',
										'persona.Celular',
										'persona.Correo',
										'visita.Fec_Reg',
										\DB::raw('(SELECT GROUP_CONCAT(r.Descripcion SEPARATOR ",") FROM referencias_visitadas rv
LEFT JOIN referencia r ON r.Cod_referencia = rv.Cod_referencia
WHERE rv.Id_Visita = visita.Id_Visita) as referencias')
										);
		return $query;
	}	
	public function listaVisita(){
		
		$arVisitas = $this->getTabla()->paginate($this->numxPages);


		
/*		//revisar carreras y fechas si esta funcionando falta implementar bien
		$arVisitas = $arVisitas->where('visita.Cod_carrera','=','1');

		$arVisitas = $arVisitas->where('persona.Paterno','=','Rojas')
								->paginate($this->numxPages);*/
		$arCarrera = Carrera::all();
		return \View::make('visitas.lista',array('data'=>$arVisitas,'arCarrera'=>$arCarrera));
	}
	public function getAllVisitas(){
		$this->data = $this->getTabla()->get();

		//return dd($this->data);
		foreach ($this->data as $key => $value) {
			$this->data[$key] = get_object_vars($this->data[$key]);
		}
		//return dd($this->data);
		$now = date('_d_m_Y_h_i_s');
		\Excel::create('reporte'.$now, function($excel) {
		    $excel->sheet('reporte', function($sheet) {
		    	$sheet->setAutoFilter('A1:H1');
		        $sheet->loadView(
		        	'excel.index',
		        	array(
		        			'cabeceras'=>array('Paterno','Materno','Nombres','carrera','Telefono','Celular','Correo','Fec_Reg','referencias'),
		        			'cabecerasText'=>array('Ap. Paterno','Ap. Materno','Nombres','Carrera','Teléfono','Celular','Correo','Fecha','Referencias'),
		        			'data'=> $this->data
		        		)
		        );

		    });
		})->export('xlsx');		
	}
}