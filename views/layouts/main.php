<?php $this->beginPage();

use yii\bootstrap\NavBar; ?>
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
NavBar::end();
?>
<div class="container" style="margin-top: 60px">
<?= $content ?>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>