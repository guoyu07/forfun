<?php
return [ 
		'components' => [ 
				'db' => [ 
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host=10.36.253.127;port=6184;dbname=forfun',
						'username' => 'uQkITdi6184',
						'password' => 'P1PiDX7eZWdyuWfO1',
						'charset' => 'utf8' 
				],
				'mailer' => [ 
						'class' => 'yii\swiftmailer\Mailer',
						'viewPath' => '@common/mail',
						'useFileTransport' => false,
						'transport' => [ 
								'class' => 'Swift_SendmailTransport' 
						] 
				],
				'urlManager' => [ 
						'enablePrettyUrl' => true,
						'showScriptName' => false 
				], 
				'session' => [
						'class' => 'yii\web\DbSession',
				],
		] 
];
