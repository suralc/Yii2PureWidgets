<?php

return array(
    'pure/base' => array(
        'sourcePath' => __DIR__ . '/assets',
        'css' => array(
            'pure.0.2.0-min.css',
        ),
    ),
    'pure/base-unresponsive' => array(
        'sourcePath' => __DIR__ . '/assets',
        'css' => array(
            'pure.0.2.0-nr-min.css',
        ),
    ),
    'pure/custom-buttons' => array(
        'sourcePath' => __DIR__ . '/assets',
        'css' => array(
            'yiiPureCustomButtonStyles.css',
        ),
        'depends' => array('pure/base'),
    ),
);