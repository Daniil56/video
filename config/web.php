<?php
return [
    'id' => 'video',
    'basePath' => realpath(__DIR__ .'/../'),
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ]
    ]
];
