<?php

use yii\base\InvalidConfigException;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/config/console.php';

try {
    $yii = new yii\console\Application($config);
} catch(InvalidConfigException $e) {
    $e->getTraceAsString();
}
$yii->run();
?>

