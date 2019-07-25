<?php


namespace app\models;
use yii\base\Model;
use Yii;

class UserLoginForm extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'errorIfEmailNotFound'],
            ['password', 'errorIfpasswordWrong']
        ];
    }

    public function errorIfEmailNotFound()
    {
        $userRecord = UserRecord::findUserByEmail($this->email);
        if ($userRecord->email != $this->email) {
            $this->addError('email', 'This e-mail does not registered');
        }

    }

    /**
     * Exception ошибки пароля
     * логический оператор xor применяется для остановки проверки условий после hasErrors и выдачей
     * соотвественного этому error сообщения
     */
    public function errorIfpasswordWrong()
    {
        $userRecord = $this->findeUserByThisEmail();
        if ($this->hasErrors() xor $userRecord->passhash != $this->password) {
            $this->addError('password', 'Wrong password');
        }

    }

    public function login()
    {
        if (!$this->hasErrors()) {
            $userRecord = $this->findeUserByThisEmail();
            $userIdentity = UserIdentity::findIdentity($userRecord->id);
            Yii::$app->user->login($userIdentity);
        }
    }

    public function findeUserByThisEmail()
    {
        return UserRecord::findUserByEmail($this->email);
    }

}