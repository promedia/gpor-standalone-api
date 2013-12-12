<?php

// Application configuration.
$params = array(
    'api' => array(
        'host' => 'api.properm.ru',
        'port' => '80',
        'path' => '/',
        'key' => ''
    ),
    'cachingPeriod' => array(
        'listCustomUrlTitles' => 24 * 60 * 60,
        'CB' => array(
            'default' => 60 * 60,
            'common_banner_top' => 24 * 60 * 60,
        ),
        'menu' => 24 * 60 * 60,
        'currencyInformer' => 24 * 60 *60,
        'weatherInformer' => 60*60        
    ),
    'token' => array(
        'default'	
    ),
    'authData' => array(
        'clientId' => 'demo', // логин клиента на бекэнде
        'clientSecret' => 'demo', // пароль клиента на бекэнде
        'authHost' => 'http://auth.properm.ru' // хост бекэнда
    )
);


return $params;
