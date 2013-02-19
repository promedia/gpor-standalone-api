<?php

// include Yii bootstrap file
require_once(dirname(__FILE__).'/../../yii/framework/yii.php');

// debug
defined('YII_DEBUG') or define('YII_DEBUG',false);

$config = require(dirname(__FILE__) . '/protected/config/main.php');
// create a Web application instance and run
Yii::createWebApplication($config)->run();