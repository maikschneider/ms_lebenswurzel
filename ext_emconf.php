<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Lebenswurzel',
    'description' => 'Sitepackage for LebensWurzel e.V.',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'fluid_styled_content' => '8.7.0-9.5.99',
            'rte_ckeditor' => '8.7.0-9.5.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'MaikSchneider\\MsLebenswurzel\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Maik Schneider',
    'author_email' => 'schneider.maik@me.com',
    'version' => '1.0.0',
];
