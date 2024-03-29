<?php
namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
    /**
     * Контроллер index.php с подключенным модулем дебага и
     * логами вывода сообщений: debug, warning, error.
     */
{
    public function actionIndex()
    {
        \Yii::debug('Hello from action index', 'test');
        \Yii::warning('warning test');
        \Yii::error('On exception');
        return  $this->render('index');
    }

    public function actionJoin() {
        return $this->render('join');
    }

    public function actionLogin() {
        return $this->render('login');
    }
}
