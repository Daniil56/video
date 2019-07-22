<?php
namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return  $this->render('index');
    }

    public function actionJoin() {
        return $this->render('index');
    }

    public function actionLogin() {
        return $this->render('index');
    }
}
