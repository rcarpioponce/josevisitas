<?php
namespace AppVisitas\Repositories;
use AppVisitas\Entities\Cargo;
class CargoRepo{
	private $cargo;
	public function __construct(){
	}
	public function getCargos(){
		return Cargo::all();
	}
}
