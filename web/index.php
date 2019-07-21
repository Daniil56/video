<?php
require __DIR__ . '/../vendor/yiisoft/yii2/yii.php';
$config = require __DIR__ . '/../config/web.php';
//$ip = gethostbyname('localhost');
//echo 'ip =' . $ip;
//echo '<hr>';

$yii = new yii\web\Application($config);
$yii->run();

