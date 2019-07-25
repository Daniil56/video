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
            [['name','email','password','rePassword'], 'required'],
            ['email', 'email', 'message' => 'Адресс электронный почты указан неверно'],
            ['name', 'string', 'min' =>3, 'max' => 30],
            ['password', 'string', 'min' => 4],
            ['rePassword', 'compare', 'compareAttribute' => 'password'],
            ['email', 'errorIsEmailUsed']
        ];
    }

    public function setTestRecord($userRecord)
    {
        $this->name = $userRecord->name;
        $this->email = $userRecord->email;
        $this->password = $this->rePassword = 'qwas';
//        $this->status = 1;
    }

    /**
     * Exception метод
     * так делать нельзя, нужно писать отдельный класс и наследоваться от  Exception class
     */
    public function errorIsEmailUsed()
    {
        if (UserRecord::existIfEmaiUsed($this->email))
            $this->addError('email', 'This email already exist');
        return;
    }
}
