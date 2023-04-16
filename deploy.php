<?php

namespace Deployer;

require_once(__DIR__ . '/vendor/xima/xima-deployer-extended-typo3/autoload.php');

set('repository', 'git@github.com:maikschneider/ms_lebenswurzel.git');

set('db_dumpclean_keep', [
    'production' => 1,
    '*' => 2
]);

host('production')
    ->setRemoteUser('lebenswurzel')
    ->setHostname('lebenswurzel.org')
    ->setPort('24327')
    ->set('labels', ['production'])
    ->set('branch', 'master')
    ->set('public_urls', [
        'https://lebenswurzel.org'
    ])
    ->set('bin/composer', '/usr/local/bin/composer')
    ->set('deploy_path', '/home/lebenswurzel/vhosts/lebenswurzel.org/typo3-production');

