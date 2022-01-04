<?php

namespace Deployer;

require_once(__DIR__ . '/vendor/blueways/deployer-recipes/autoload.php');

set('repository', 'git@github.com:maikschneider/ms_lebenswurzel.git');

set('db_dumpclean_keep', [
    'production' => 1,
    '*' => 2
]);

host('production')
    ->hostname('lebenswurzel.org')
    ->port('24327')
    ->stage('production')
    ->user('lebenswurzel')
    ->set('http_user', 'www-data')
    ->set('writable_mode', 'chmod')
    ->set('branch', 'master')
    ->set('public_urls', [
        'https://lebenswurzel.org'
    ])
    ->set('bin/composer', '/usr/local/bin/composer')
    ->set('bin/php', '/usr/bin/php7.3')
    ->set('deploy_path', '/home/lebenswurzel/vhosts/lebenswurzel.org/typo3-production');

host('local')
    ->hostname('local')
    ->set('deploy_path', getcwd());
