<?php
namespace AppVisitas\Repositories;
class MailRepo{
	public function sendEmail(){
		//return $this->inputs;
		$inputs = \Input::all();
		$contenido = 'ok ok contenido 23r3r23';
		$this->data = array('contenido' => $contenido);
		$this->asunto = 'Hola Mundo';
		$asunto = $inputs['asunto'];
		\Mail::send('emails.visitas', $this->data, function($message) use ($contenido)
		{
		    $message->to('me@renzocarpio.com', 'Renzo Carpio')->subject('El Sistema de visitas 1');
		});
	}
}
