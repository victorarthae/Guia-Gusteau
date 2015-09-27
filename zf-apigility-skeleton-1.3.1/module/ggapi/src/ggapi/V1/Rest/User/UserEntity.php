<?php
namespace ggapi\V1\Rest\User;

class UserEntity
{
	public $id;
	public $username;
	public $password;

	public function getArrayCopy(){

		return array(
				'id_user' => $this->id,
				'username' => $this->username,
				'password' => $this->password
		);
	}

	public function exchangeArray(array $array){
		$this->id = $array['id_user'];
		$this->username = $array['username'];
		$this->password = $array['password'];
	}

}
