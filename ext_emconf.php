<?php

/**
 * Extension Manager/Repository config file for ext "starterkit".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Starterkit',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'rte_ckeditor' => '8.7.0-9.5.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Giesen\\Starterkit\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Martin Giesen',
    'author_email' => 'martin@giesen-webentwicklung.de',
    'author_company' => 'Giesen Webentwicklung',
    'version' => '1.0.0',
];
