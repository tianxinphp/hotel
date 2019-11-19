<?php
return [
    'modules'=>[
        'admin'=>[
            'class'=>'mdm\admin\Module'
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@mdm/admin'   => '@vendor/mdmsoft/yii2-admin'
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
        ],
    ],
    'as access'=>[
        'class'=>'mdm\admin\components\AccessControl',
        'allowAction'=>[
//            '*'
        ],
    ]
];
