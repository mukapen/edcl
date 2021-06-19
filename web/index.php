<?php
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');


require __DIR__ . '/../vendor/autoload.php'; //register composer autoloader
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php'; //include Yii class file

$config = require __DIR__ . '/../config/web.php'; //load application configuration

(new yii\web\Application($config))->run();// create, configure and run the application
