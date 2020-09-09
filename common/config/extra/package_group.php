<?php

$collection = [
    [
        'name' => 'rocket-php-lab',
        'provider_name' => 'gitlab',
        'authors' => [
            [
                'name' => 'Rocket Firm',
            ],
        ],
    ],
];

$baseCollection = require(__DIR__ . '/../../../vendor/zntool/dev/src/Package/Domain/Data/package_group.php');
return array_merge($baseCollection, $collection);
