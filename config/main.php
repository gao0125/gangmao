<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);
//    require(__DIR__ . '/../../common/config/params-local.php'),
//    require(__DIR__ . '/params-local.php')
$imgPath = isset($_GET['redactor_img_src']) ?  $_GET['redactor_img_src'] : 'other'; //('redactor_img_src' , 'other');

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'rbac' =>  [
            'class' => 'johnitvn\rbacplus\Module',
            'userModelClassName'=>null,
            'userModelIdField'=>'id',
            'userModelLoginField'=>'username',
            'userModelLoginFieldLabel'=>null,
            'userModelExtraDataColumls'=>null,
            'beforeCreateController'=>null,
            'beforeAction'=>null
        ],
        'gridview' => [
        'class' => '\kartik\grid\Module',
        ],
        'redactor' => [ 
            'class' => 'yii\redactor\RedactorModule', 
            // 'uploadDir' => '@webroot/files/' . $imgPath,//'@webroot/path/to/uploadfolder',
            // 'uploadUrl' => '@web/files/' . $imgPath,
            'imageAllowExtensions'=>['jpg','png','gif'] 
         ], 
    ],
    'components' => [
        'urlManager' => [
           'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
//            'showScriptName' => false,
           // 'rules' => [
               // '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
           // ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pwh-k9OZOnb-nhiYIeAbqpmkRHIWftQb',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'backend_auth_item',
            'assignmentTable' => 'backend_auth_assignment',
            'itemChildTable' => 'backend_auth_item_child',
            'ruleTable' => 'backend_auth_rule',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

    ],
    'params' => $params,
];
