<?php
use AppVisitas\Repositories\RegistroRepo;
use AppVisitas\Repositories\VisitaRepo;
class RegistroController extends Controller {
	public function __construct(){
		$this->repo = new RegistroRepo;
		$this->visitaRepo = new VisitaRepo;
	}
	public function index(){
		return $this->repo->index();
	}
	public function saveVisita(){
		return $this->visitaRepo->saveVisita();
	}
	public function listaVisita(){
		return $this->visitaRepo->listaVisita();
	}
	public function reporte(){
		return $this->visitaRepo->getAllVisitas();
	}
}
