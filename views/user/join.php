<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="panel-danger">
    <div class="panel-heading">
        <h1>Join us</h1>
    </div>
    <div class="panel-body">
        Fill register form<br/><br/>
        <?php
        $form = ActiveForm::begin(['id' => 'user-join-form']); ?>
        <?= $form ->field($userJoinForm, 'name') ?>
        <?= $form ->field($userJoinForm, 'email') ?>
        <?= $form ->field($userJoinForm, 'password')->passwordInput()?>
        <?= $form ->field($userJoinForm, 'rePassword')->passwordInput() ?>
        <?= Html::submitButton('Create',
            ['class' => 'btn btn-danger']) ?>
<?php ActiveForm::end(); ?>
    </div>
</div>

