<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="panel-info">
    <div class="panel-heading">
        <h1>Log in</h1>
    </div>
    <div class="panel-body">
        <?php
        $form = ActiveForm::begin(['id' => 'user-login-form']) ?>
        <?= $form ->field($userLoginForm, 'email') ?>
        <?= $form ->field($userLoginForm, 'password')->passwordInput()?>
        <?= $form->field($userLoginForm, 'remember')->checkbox() ?>
        <?= Html::submitButton('Enter',
            ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

