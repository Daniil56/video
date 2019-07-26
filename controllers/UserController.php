<?php
namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserLoginForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;
use yii\web\Request;

class UserController extends Controller
    /**
     * Контроллер index.php с подключенным модулем дебага и
     * логами вывода сообщений: debug, warning, error.
     * @return @fucntion должен быть один выход из функции, так как это позволяет провести тестирование метода с отдним
     * маркером дебага
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
        if (Yii::$app->request->isPost)
            return $this->actionLoginPost();
        $userLoginForm = new UserLoginForm();
        return $this->render('login', compact('userLoginForm'));
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
            $this->redirect('/user/login');

        }
        return $this->render('join', compact('userJoinForm'));
    }

    private function actionLoginPost()
    {
        $userLoginForm = new UserLoginForm();
        if ($userLoginForm->load(Yii::$app->request->post()) && $userLoginForm->validate()) {
            $userLoginForm->login();
            $result = $this->redirect('/');
        } else {
        $result = $this->render('login', compact('userLoginForm'));
    }
        return $result;
    }
}