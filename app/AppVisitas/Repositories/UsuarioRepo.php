<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\User;
class UsuarioRepo{
	public function __construct(){
		$this->usuario = new User;
		$this->cargoRepo = new CargoRepo;
	}
	public function getUsuarios(){
		return \DB::table('usuarios')
					->join('cargo','usuarios.Cod_Cargo','=','cargo.Cod_Cargo')
					->select(\DB::raw('usuarios.*'),'cargo.Descripcion')
					->get();
	}
	public function getModulo(){
		$data = array(
					'arCargo' => $this->cargoRepo->getCargos(),
					'arUsuarios' => $this->getUsuarios()
				);
		return \View::make('visitas.mantenimiento',$data);
	}
	public function addUsuario(){
		$this->inputs = \Input::all();
		$this->inputs['Clave'] = \Hash::make($this->inputs['Clave']);
		User::create($this->inputs);
		return $this->getModulo();
	}
	public function login(){
		$this->inputs = \Input::all();
		$login 		= $this->inputs['login'];
		$password 	= $this->inputs['password'];
		if (\Auth::attempt(array('login' => $login, 'password' => $password)))
		{
    		return \Redirect::to('registro');
		}else{
			return \Redirect::to('/');
		}
	}
}