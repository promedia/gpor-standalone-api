<?php

// Application configuration.
$params = array(
    'api' => array(
        'host' => 'api.newperm.gpor.ru',
        'port' => '80',
        'path' => '/',
        'key' => 'cfe2b2498aec5b086ac9da1a67bd2fe9'
    ),
    'cachingPeriod' => array(
        'CB' => array(
            'default' => 60 * 60,
            'common_banner_top' => 24 * 60 * 60,
        ),
        'header' => 1,
        'weatherInformer' => 60*60,
        'menu' => 1
    ),
    'token' => array(
        'default'
    )
);


return $params;
