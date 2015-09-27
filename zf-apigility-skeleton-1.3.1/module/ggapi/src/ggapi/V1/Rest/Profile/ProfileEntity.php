<?php
namespace ggapi\V1\Rest\Profile;

class ProfileEntity
{
    public $email;
    public $photo;
    public $gender;
    public $birthday;
    public $id;

    public function getArrayCopy(){

        return array(
            'id_user' => $this->id,
            'birthday' => $this->birthday,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'email' => $this->email
        );
    }

    public function exchangeArray(array $array){
        $this->id = $array['id_user'];
        $this->birthday = $array['birthday'];
        $this->photo = $array['photo'];
        $this->gender = $array['gender'];
        $this->email = $array['email'];
    }

}
