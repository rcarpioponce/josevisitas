<?php
namespace AppVisitas\Repositories;
class MailRepo{
	public function sendEmail(){
		//return $this->inputs;
		$inputs = \Input::all();
		$file = \Input::file('file');
		if(\Input::hasFile('file')){

			$file->move('adjunto', $file->getClientOriginalName());
		}
		$this->path = 'adjunto/'.$file->getClientOriginalName();
		$contenido = $inputs['mensaje'];
		$this->data = array('contenido' => $contenido);
		$this->asunto = $inputs['asunto'];
		$this->correos = explode(',',$inputs['correos']);
		\Mail::send('emails.visitas', $this->data, function($message) use ($contenido)
		{
		    $message->to($this->correos)->subject('Asunto:'.$this->asunto);
		    $message->attach($this->path);
		});
	}
}
