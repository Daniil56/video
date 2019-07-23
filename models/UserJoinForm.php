<?php
namespace app\models;

use yii\base\Model;

class UserJoinForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $rePassword;

    public function rules ()
    {
        return
        [
            [['name','email','password','rePassword'], 'required']
        ];
    }
}
