<?php
use AppVisitas\Repositories\UsuarioRepo;
class AuthController extends BaseController {
	public function login(){
		$usuario = new UsuarioRepo;
		return $usuario->login();
	}

}
