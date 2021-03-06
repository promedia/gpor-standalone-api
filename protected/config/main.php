<?php

$params = require_once(dirname(__FILE__) . '/../../appConfig/params.php');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'API-methods of header and footer getting ',
    // preloading 'log' component
    'preload' => array('log'),
    'charset'=>'utf-8',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),
   'modules' => array(
    // uncomment the following to enable the Gii tool
    /*
      'gii' => array(
      'class' => 'system.gii.GiiModule',
      'password' => 'admin',
      ),
     *
     */
    ),
    // application components
    'components' => array(
        
		'cache' => array(
			'class'=>'system.caching.CFileCache',
		),
        
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '/',
            'routeVar' => 'route',
            'rules' => array(
                '/' => 'gporApi/index',
                '<action>' => 'gporApi/<action>',
            ),
        ),
    
        'errorHandler'=>array(
            'errorAction'=>'gporApi/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'logFile' => 'error.log',
                    'categories' => 'system.*, application.*, exception.CDbException',
                    'enabled' => true,
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => '404.log',
                    'levels' => 'error',
                    'categories' => 'exception.CHttpException.404',
                    'enabled' => true,
                ),  
								array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace',
                    'categories' => 'application.*',
                    'logFile' => 'app_trace.log',
                    'enabled' => true,
                ),
                array(
                    'class' => 'CProfileLogRoute',
                    'levels' => 'error, warning, trace, info, profile',
                    'enabled' => false,
                ),
            ),
        ),
    ),
    'params' => $params,
);
