<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../vendor/autoload.php';          //自动加载
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';  //实例化 容器对象 等等
require __DIR__ . '/../../common/config/bootstrap.php';  //目录别名   例backend
require __DIR__ . '/../config/bootstrap.php';            //定义别名

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

(new yii\web\Application($config))->run();
