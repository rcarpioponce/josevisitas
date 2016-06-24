<?php
use AppVisitas\Repositories\RegistroRepo;
class RegistroController extends Controller {
	public function __construct(){
		$this->repo = new RegistroRepo;
	}
	public function index()
	{
		return $this->repo->index();
	}

}
