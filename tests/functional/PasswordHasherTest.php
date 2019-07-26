<?php

use app\models\UserRecord;
use Codeception\Test\Unit;
use yii\base\Security;

class PasswordHasherTest extends Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Тест модели class UserRecord.
     * Проверяет наличие юзера в базе данных по имени с помощью
     * статического метода суперкласса
     */
    public function testSomeFeature()
    {
        $this->assertTrue(true, 'False is not true');
        $userRecord =  UserRecord::findOne(1);
        $this->assertEquals("Shakira Stroman", $userRecord->name, "John does not found");
    }

    /**
     * Тест хэширования пароля.
     * Проверяет создание пользователя;
     * задания через сеттер ему пароля;
     * сохранение в баззе данных;
     * поиск в базе данных по id пользователя.
     * Сверяет @class UserRecord найденного юзера в переменной @param $userRecord_found
     * с изначальным экземпляром @class UserRecord @param $userRecord_local ;
     * хэш пароля @param $pass.  на валидность
     *
     */
    public function testPasswordIsHash()
    {
        $pass = 'qwas';
        $userRecord_local = new UserRecord();
        $userRecord_local->setTestUser();

        $userRecord_local->setPassword($pass);
        $userRecord_local->save();

        $userRecord_found = UserRecord::findOne($userRecord_local->id);
        $this->assertInstanceOf(get_class($userRecord_local), $userRecord_found);

        $security = new  Security();
        $this->assertTrue($security->validatePassword(
            $pass,
            $userRecord_found->passhash
        ));
    }

    /**
     * Тест на повторное хэширование пароля.
     * Проверяет создание пользователя;
     * задания через сеттер ему пароля;
     * сохранение в баззе данных;
     * поиск в базе данных по id пользователя.
     * Сохраняет первый хэш, меняет имя пользовтеля, сохраняем в бд.
     * Проверяет валиден ли хэш;
     * проверяет сохраненный и взятый из бд хэш на идентичность
     *
     * Создает р
     */
    public function testPasswordIsNotRehashed()
    {
        $pass = "qwas123";
        $userRecord_local = new UserRecord();
        $userRecord_local->setTestUser();

        $userRecord_local->setPassword($pass);
        $userRecord_local->save();

        $first_hash = $userRecord_local->passhash;

        $userRecord_local->name .= mt_rand(1, 9);
        $userRecord_local->save();

        $this->assertEquals($first_hash, $userRecord_local->passhash);

        $userRecord_found = UserRecord::findOne($userRecord_local->id);
        $this->assertEquals($first_hash, $userRecord_found->passhash);
    }


}