<?php
namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;

class UserController extends Controller
    /**
     * Контроллер index.php с подключенным модулем дебага и
     * логами вывода сообщений: debug, warning, error.
     */
{
    public function actionJoin()
    {
        if (Yii::$app->request->isPost) {
            $result = $this->actionJoinPost();
        } else {
            $userJoinForm = new UserJoinForm();
            $userRecord = new UserRecord();
            $userRecord->setTestUser();
            $userJoinForm->setTestRecord($userRecord);
            $result = $this->render('join', compact('userJoinForm'));
        }
        return $result;
    }

    public function actionLogin()
    {
//        $uid = UserIdentity::findIdentity(mt_rand(0, 58));
//        Yii::$app->user->login($uid);
        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect("/");
    }

    private function actionJoinPost()
    {
        $userJoinForm = new UserJoinForm();
        if ($userJoinForm->load(Yii::$app->request->post()) && $userJoinForm->validate()) {
            $userRecord = new UserRecord();
            $userRecord->setUserJoinForm($userJoinForm);
            $userRecord->save();

        }
        return $this->render('join', compact('userJoinForm'));
    }
}