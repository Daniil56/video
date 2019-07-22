<?php
namespace app\controllers;

use yii\web\Controller;

class UserController extends Controller
    /**
     * Контроллер index.php с подключенным модулем дебага и
     * логами вывода сообщений: debug, warning, error.
     */
{
    public function actionJoin() {
        return $this->render('join');
    }

    public function actionLogin() {
        return $this->render('login');
    }
}
