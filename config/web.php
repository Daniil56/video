<?php
return [
    'id' => 'video',
    'basePath' => realpath(__DIR__ .'/../'),
    'bootstrap' => [
      'debug'
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],
        'request' => [
            'cookieValidationKey' => 'My secret $'
        ]
    ],
    'modules' => [
        'debug' =>'yii\debug\Module'
    ]
];
