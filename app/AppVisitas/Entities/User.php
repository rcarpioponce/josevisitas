<?php
namespace AppVisitas\Entities;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';
	protected $primaryKey = 'Cod_Usuario';
	public $timestamps  = false;


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('Apellidos', 'Nombres','Login','Clave','Cod_Cargo');
	protected $hidden = array('Clave', 'remember_token');

	public function getAuthPassword() {
    	return $this->Clave;
	}
}
