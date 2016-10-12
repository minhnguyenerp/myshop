<?php

$params = require(__DIR__ . '/params.php');

$modules = [
	'api' => [
		'class' => 'app\api\modules\v1\Module',
	],
	'rbac' => [
		'class' => 'johnitvn\rbacplus\Module',
		'userModelClassName'=>'app\modules\general\models\User',
        'userModelIdField'=>'user_id',
        'userModelLoginField'=>'username',
        'userModelLoginFieldLabel'=>null,
        'userModelExtraDataColumls'=>null,
        'beforeCreateController'=>null,
        'beforeAction'=>null
	],
];

$params['config']['modules'] = $modules;

$config = [
    'id' => 'ivy',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
		/*
        'cache' => [
            'class' => 'yii\caching\ApcCache',
			'useApcu' => true
        ],
		*/
        'user' => [
			'identityClass' => 'app\modules\user\models\User',
            //'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'general/site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
			'dsn' => 'mysql:host='.($params['is_config_file'] ? $params['config']['host'] : '').';dbname='.($params['is_config_file'] ? $params['config']['database'] : ''),
			'username' => (string)($params['is_config_file'] ? $params['config']['db_user'] : ''),
			'password' => (string)($params['is_config_file'] ? $params['config']['db_pass'] : ''),
			'charset' => 'utf8',
			//'enableSchemaCache' => (YII_ENV_DEV ? false : true),
			//'schemaCacheDuration' => 7200,
			//'enableQueryCache' => (YII_ENV_DEV ? false : true),
			//'queryCacheDuration' => 7200,
		],

		'session' => [
			'class' => 'yii\web\DbSession',
			'sessionTable' => 'my_session',
		],

		'urlManager' => [
			'class' => 'yii\web\UrlManager',
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'ivyppic-<user_id:\d+>-<rn:\d+>.jpg' => 'general/upload/avatar-image',
				'ivy-app-logo' => 'site/ivy-app-logo',
                'my/<domain:\w+>' => 'site/redirect',
			]
        ],
		'assetManager' => [
			'class' => 'yii\web\AssetManager',
			'appendTimestamp' => (YII_ENV_DEV ? true : false),
			'bundles' => [
				'yii\jui\JuiAsset' => [
					'css' => [
						YII_ENV_DEV ? 'themes/redmond/jquery-ui.css' : 'themes/redmond/jquery-ui.min.css',
					],
					'js' => [
						YII_ENV_DEV ? 'jquery-ui.js' : 'jquery-ui.min.js',
					]
				],
				'yii\web\JqueryAsset' => [
					'js' => [
						YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
					]
				],
				'yii\bootstrap\BootstrapAsset' => [
					'css' => [
						YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
					]
				],
				'yii\bootstrap\BootstrapPluginAsset' => [
					'js' => [
						YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
					]
				]
			],
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
			//'cache' => 'cache',
		],
		'i18n' => [
			'translations' => [
				'*' => ['class' => 'yii\i18n\PhpMessageSource'],
			]
		],
    ],
	'timeZone' => (isset($params['config']['timeZone']) ? $params['config']['timeZone'] : 'America/Los_Angeles'),
	'modules' => ($params['is_config_file'] ? $params['config']['modules'] : $modules),
    'params' => $params,
	//'layout' => 'honey',
	'layout' => 'home',
	//'language' => 'vi-VN',
	'language' => (isset($params['config']['language']) ? $params['config']['language'] : 'en-US'),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1', '::1'],
		'generators' => [ //here
			'crud' => [ // generator name
				'class' => 'yii\gii\generators\crud\Generator', // generator class
			]
		],
	];
}

unset($params);
unset($modules);

return $config;
