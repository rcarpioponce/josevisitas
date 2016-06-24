<?php
use AppVisitas\Repositories\MailRepo;
use AppVisitas\Entities\Carrera;
class MailController extends Controller {
	public function __construct(){
		$this->repo = new MailRepo;
	}
	public function index()
	{
		$data = array('arCarreras'=> Carrera::all());
		return \View::make('visitas.correos',$data);
	}
	public function sendMail(){
		$this->repo->sendEmail();
		return $this->index();
	}

}
