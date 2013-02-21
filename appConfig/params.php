<?php

// Application configuration.
$params = array(
    'api' => array(
        'host' => 'api.newperm.gpor.ru',
        'port' => '80',
        'path' => '/',
        'key' => ''
    ),
    'cachingPeriod' => array(
        'CB' => array(
            'default' => 60 * 60,
            'common_banner_top' => 24 * 60 * 60,
        ),
        'header' => 60 * 60,
    )
);


return $params;
