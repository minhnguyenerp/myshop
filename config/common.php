<?php
$config = [
    'id' => 'vii-system',
    'basePath' => dirname(__DIR__),
	'vendorPath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fjdslkfjsdklafjs83454',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'dashboard/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=test',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		],
		'i18n' => [
			'translations' => [
				'*' => ['class' => 'yii\i18n\PhpMessageSource'],
			]
		],
    ],
	'timeZone' => 'Asia/Ho_Chi_Minh',
	'language' => 'vi',
	'modules' => [
		'dashboard' => [
			'class' => 'app\packages\dashboard\Module',
		],
		'user-account' => [
			'class' => 'app\packages\user-account\Module',
		],
	],
    //'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;