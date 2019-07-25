<?php
namespace app\models;
use Faker\Factory;
use Yii;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function tableName() {
        return 'user';
    }

    public static function existIfEmaiUsed($email)
    {
        $count = static::find()->where(['email'=>$email])->count();
        return $count > 0;
    }

    public static function findUserByEmail($email)
    {
        return static::findOne(['email'=>$email]);
    }

    public function setTestUser()
    {
        $faker = Factory::create();
        $this->name = $faker->name;
        $this->email = $faker->email;
        $this->setPassword($faker->password);
        $this->status = $faker->randomDigit;
    }

    public function setUserJoinForm(UserJoinForm $userJoinForm)
    {
        $this->name = $userJoinForm->name;
        $this->email = $userJoinForm->email;
        $this->setPassword($userJoinForm->password);
        $this->status = 1;
    }

    public function setPassword($password) {

        $this->passhash = Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->passhash);
    }
}
