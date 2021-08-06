<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'name' => "SOLEMOLE",
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
        'forum' => [
            'class' => 'app\modules\forum\Forum',
        ], 
		'api' => [
            'class' => 'app\modules\api\Api',
        ],
    ],
    'components' => [
        'request' => [
		 'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ],
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fWOrOOCY-Oe-yH66DbjHoOyEWKvv5fu6',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'util' => [
            'class' => 'app\components\LEComponent',
        ],
		'api' => [
            'class' => 'app\modules\api\components\Api',
          
        ],
		'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['lifetime' => 7 * 24 *60 * 60]
       ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'cart' => [
            'class' => 'app\components\CEComponent',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'premium51.web-hosting.com',
				'username' => 'team@solemole.com',
				'password' => 'saddamrao123',
				'port' => '587',
				'encryption' => 'tls',
			],
        ],
		'reCaptcha' => [
			'name'    => 'reCaptcha',
			'class'   => 'himiklab\yii2\recaptcha\ReCaptcha',
			'siteKey' => '6Ldy4WQUAAAAAJWSXxXtE86m_IEyFKSVD8ZtaY_P',
			'secret'  => '6Ldy4WQUAAAAAEPh7SuQ2VJ700ahd-jseGFUF6eh',
		],
		'eauth' => [
            'class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => [
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ],
            'services' => [ // You can change the providers and their classes.
                'google' => [
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'nodge\eauth\services\GoogleOAuth2Service',
                    'clientId' => '568701672316-0bq1mirskte0e3g7g2pjtmgk56jg22qh.apps.googleusercontent.com',
                    'clientSecret' => 'okv5Qdd2NbsXQes2jcQ9hycx',
                    'title' => 'Google',
                ],          
                'facebook' => [
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '1188718727850500',
                    'clientSecret' => '6224311629c6a5aff54db152da3f095a',
                ],
                
            ]   
                
        ],
		'i18n' => [
            'translations' => [
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
            ],
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				
				'api/user/register'=>'api/site/register',
				'api/user/index'=>'api/site/index',
                'api/user/authorize'=>'api/site/authorize',
                'api/user/accesstoken'=>'api/site/accesstoken',
                'api/user/me'=>'api/site/me',
                'api/user/login'=>'api/site/authorize',
                'api/user/forgot'=>'api/site/forgot',
                'api/user/change-pass'=>'api/site/change-pass',
                'api/user/logout'=>'api/site/logout',
				
				'<module:api>/<controller:\w+>' => '<module>/<controller>/index',
				'<module:api>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<module:api>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
				'<module:api>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
				

				'<module:forum>/<controller:\w+>' => '<module>/<controller>/index',
				'<module:forum>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<module:forum>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
				'<module:forum>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
				'<module:forum>/<controller:category>/<slug:[A-Za-z0-9 -_.]+>/<page:\d+>' => 'forum/category/view',
				'<module:forum>/<controller:category>/<slug:[A-Za-z0-9 -_.]+>' => 'forum/category/view',
				'<module:forum>/<controller:post>/<slug:[A-Za-z0-9 -_.]+>/<page:\d+>' => 'forum/post/view',
				'<module:forum>/<controller:post>/<slug:[A-Za-z0-9 -_.]+>' => 'forum/post/view',
				
				'/site/activate/<key:.*>'=>'/site/activate',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
				'gym/<slug:[A-Za-z0-9 -_.]+>' => 'gym/view',
				'work/<slug:[A-Za-z0-9 -_.]+>' => 'work/view',
				'event/<slug:[A-Za-z0-9 -_.]+>' => 'event/view',
				'branch/<slug:[A-Za-z0-9 -_.]+>' => 'branch/view',
				'product/<slug:[A-Za-z0-9 -_.]+>' => 'product/detail',
				
				'/login/<service:google|facebook|etc|google_oauth>' => 'site/login',
                '/login/signup' => 'site/signup',
                
            ],
        ],
        
    ],
    'params' => $params,
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
