<?php
return [
	'modules' => [
		'admin' => [
			'class' => 'mdm\admin\Module',
		],
		'pdfjs' => [
		    'class' => '\yii2assets\pdfjs\Module',
	    ],
	],
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
			'course/*',
			'gii/*',
			'pdfjs/*',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager',
		],
		'user' => [
			'identityClass' => 'mdm\admin\models\User',
			'loginUrl' => ['site/login'],
		],
    ],
	'controllerMap' => [
        'file' => 'mdm\upload\FileController', // use to show or download file
    ],
];
