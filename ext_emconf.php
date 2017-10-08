<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Mailchimp subscription',
    'description' => 'Simple MailChimp integration to let users register to a specific list',
    'category' => 'plugin',
    'author' => 'Georg Ringer',
    'author_email' => 'g.ringer@supseven.at',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.9.99'
        ],
        'conflicts' => [],
        'suggests' => [
            'typoscript_rendering' => '1.0.5-1.99.999'
        ],
    ],
];
