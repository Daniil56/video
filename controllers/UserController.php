<?php
namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;

class UserController extends Controller
    /**
     * Контроллер index.php с подключенным модулем дебага и
     * логами вывода сообщений: debug, warning, error.
     */
{
    public function actionJoin() {
//        $userRecord = new UserRecord();
//        $userRecord->setTestUser();
//        $userRecord->save();
        return $this->render('join');
    }

    public function actionLogin() {
        $uid = UserIdentity::findIdentity(mt_rand(0, 58));
        Yii::$app->user->login($uid);
        return $this->render('login');
    }
}
