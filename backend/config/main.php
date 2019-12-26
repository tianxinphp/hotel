<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','gii','debug'],
    'timeZone' => 'PRC',
    'modules' => [
        'gii'=>[
            'class'=>'yii\gii\Module',
            'allowedIPs'=>['127.0.0.1', '::1','101.95.166.54'],
            'generators'=>[
                'crud'=>[
                    'class'=>'yii\gii\generators\crud\Generator',
                    'templates'=>[
                        'myCurd'=>'@common/components/gii-custom/crud/default',
                    ]
                ]
            ]
        ],
        'debug'=>[
            'class'=>'yii\debug\Module',
            'allowedIPs'=>['127.0.0.1', '::1','101.95.166.54']
        ],
        'admin'=>[
            'class'=>'mdm\admin\Module'
        ]
    ],
    'aliases'=>[
        '@mdm/admin'   => '@vendor/mdmsoft/yii2-admin'
    ],
    'components' => [
        'myComponent'=>[
            'class'=>'backend\components\MyComponent',
            'Pram1'=>1,
            'Pram2'=>2,
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\UserBackend',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3: 3,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info','trace'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
            'maxSourceLines' => 50,
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'mailer'=>[
            'class'=>'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host'=>'smtp.qq.com',
                'username'=>'844577216@qq.com',
                'password'=>'eovxhvzxoubibfda',
                'port'=>'465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['844577216@qq.com'=>'田鑫']
            ]
        ]
    ],
    'as access'=>[
        'class'=>'mdm\admin\components\AccessControl',
        'allowActions'=>[
        ],
    ],
    'params' => $params,
];
