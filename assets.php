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
    'pure/buttons/custom' => array(
        'sourcePath' => __DIR__ . '/assets',
        'css' => array(
            'yiiPureCustomButtonStyles.css',
            'yiiPureCustomButtonSize.css',
        ),
        'depends' => array('pure/base'),
    ),
);