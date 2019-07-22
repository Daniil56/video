<?php

use yii\base\InvalidConfigException;

define('YII_DEBUG', true);

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/../config/web.php';

try {
    $yii = new yii\web\Application($config);
} catch(InvalidConfigException $e) {
    $e->getTraceAsString();
}
$yii->run();

