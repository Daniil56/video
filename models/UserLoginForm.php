<?php


namespace app\models;
use yii\base\Model;
use Yii;

class UserLoginForm extends Model
{
    public $email;
    public $password;
    public $remember;
    private $userRecord;


    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'errorIfEmailNotFound'],
            ['password', 'errorIfpasswordWrong'],
            ['remember', 'boolean']
        ];
    }

    public function errorIfEmailNotFound()
    {
        $this->userRecord = UserRecord::findUserByEmail($this->email);
        if ($this->hasErrors() || $this->userRecord == null || $this->userRecord->email != $this->email) {
            $this->addError('email', 'This e-mail does not registered');
        }

    }

    /**
     * Exception ошибки пароля
     * логический оператор or применяется для остановки проверки условий после hasErrors и выдачей
     * соотвественного этому error сообщения
     */
    public function errorIfpasswordWrong()
    {
        $this->userRecord = $this->findeUserByThisEmail();
        if ($this->hasErrors() or !$this->userRecord->validatePassword($this->password)) {
            $this->addError('password', 'Wrong password');
        }

    }

    public function login()
    {
        if (!$this->hasErrors()) {
            $this->userRecord = $this->findeUserByThisEmail();
            $userIdentity = UserIdentity::findIdentity($this->userRecord->id);
            Yii::$app->user->login($userIdentity,
                $this->remember ? 3600 * 24 * 30 : 0);
        }
    }

    public function findeUserByThisEmail()
    {
        return UserRecord::findUserByEmail($this->email);
    }

}