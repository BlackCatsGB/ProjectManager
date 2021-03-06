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
    'name'=>'Project manager ++',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'modules' => [],
    'layout'=>'adminLTE/main.php', //путь до layout ADMIN LTE
    'components' => [
        'language' => 'ru_RU',
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => 'security',
                    'logFile' => '@runtime/logs/security.log',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['api/user', 'api/project'],
                ],
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',//контроллер теперь понимает путь task/123 и работает как с task/view?id=12
                '<controller>' => '<controller>/index',//контроллер теперь понимает путь tasks и работает как с task/index
            ],
        ],
        //ADMIN LTE 2 - показ возможностей на основе шаблона - примера
        /*'view' => [
            'theme' => [
                'pathMap' => [
                    //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app',
                    '@app/views' => '@backend/views/layouts/adminLTE/main.php'
                ],
            ],
        ],*/
    ],
    'params' => $params,
];
