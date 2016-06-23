<?php
use AppVisitas\Repositories\UsuarioRepo;
class MantenimientoController extends BaseController {
	public function __construct()
	{
		$this->usuarioRepo = new UsuarioRepo;
	}
	public function index(){
		return $this->usuarioRepo->getModulo();
	}
	public function addUsuario(){
		return $this->usuarioRepo->addUsuario();
	}

}
