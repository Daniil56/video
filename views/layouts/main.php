<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->beginPage();
?>
<html lang="eng">
<head>
    <title> Video school</title>
    <?php $this->head(); ?>

</head>

<body>
<?php $this->beginBody(); ?>
<?php
NavBar::begin([
        'brandLabel' => 'WEB DEVELOPERS',
        'brandUrl' => Yii::$app->homeUrl,
    'options' => [
            'class' => 'navbar-default navbar-fixed-top'
    ]
]);
/**
 * Асоциативнй массив  с ключами лейблами и значениями ссылок
 */
$items = [
        ['label' => 'Join', 'url' => ['/user/join']],
        ['label' => 'Login', 'url' => ['/user/login']]
]
;
/**
 * Виджет рендера бокового меню логина
 * @throws Exception
 * @return string the rendering result of the widget
 */
try {
    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav navbar-right'],
        'items' => $items
    ]);
} catch (Exception $exception) {
    $exception->getTraceAsString();
}
NavBar::end();
?>
<div class="container" style="margin-top: 60px">
<?= $content ?>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>