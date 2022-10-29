<?php
return [
    'BE' => [
        'compressionLevel' => '0',
        'debug' => false,
        'explicitADmode' => 'explicitAllow',
        'installToolPassword' => '$pbkdf2-sha256$25000$hgKzBbTsU1oQDRUAXbcQaw$XPcTghq03szaT/Sa6CE1orsxKMRzNO.RmS3fuEn1YQY',
        'lockSSL' => true,
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8',
                'driver' => 'mysqli',
            ],
        ],
    ],
    'EXT' => [],
    'EXTCONF' => [
        'helhum-typo3-console' => [
            'initialUpgradeDone' => '11.5',
        ],
        'lang' => [
            'availableLanguages' => [
                'de',
            ],
        ],
    ],
    'EXTENSIONS' => [
        'backend' => [
            'backendFavicon' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Icons/backend.png',
            'backendLogo' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Icons/backend.png',
            'loginBackgroundImage' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Backend/login_screen.jpg',
            'loginFootnote' => '',
            'loginHighlightColor' => '#3E5F46',
            'loginLogo' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Frontend/svg/lebenswurzel_logo.svg',
            'loginLogoAlt' => '',
        ],
        'bw_placeholder_images' => [
            'triangularApiKey' => 'D78i1FbsOTOFRyhMjEoa',
            'triangularServer' => 'http://127.0.0.1:8080',
        ],
        'extensionmanager' => [
            'automaticInstallation' => '1',
            'offlineMode' => '0',
        ],
        'news' => [
            'advancedMediaPreview' => '1',
            'archiveDate' => 'date',
            'categoryBeGroupTceFormsRestriction' => '0',
            'categoryRestriction' => '',
            'contentElementPreview' => '1',
            'contentElementRelation' => '1',
            'dateTimeNotRequired' => '0',
            'hidePageTreeForAdministrationModule' => '0',
            'manualSorting' => '0',
            'mediaPreview' => 'false',
            'prependAtCopy' => '1',
            'resourceFolderImporter' => '/news_import',
            'rteForTeaser' => '0',
            'showAdministrationModule' => '1',
            'showImporter' => '0',
            'slugBehaviour' => 'unique',
            'storageUidImporter' => '1',
            'tagPid' => '1',
        ],
        'scheduler' => [
            'maxLifetime' => '1440',
            'showSampleTasks' => '1',
        ],
    ],
    'FE' => [
        'compressionLevel' => 0,
        'debug' => false,
    ],
    'GFX' => [
        'jpg_quality' => '80',
        'processor' => 'GraphicsMagick',
        'processor_allowTemporaryMasksAsPng' => false,
        'processor_colorspace' => 'RGB',
        'processor_effects' => false,
        'processor_enabled' => true,
        'processor_path' => '/usr/bin/',
        'processor_path_lzw' => '/usr/bin/',
    ],
    'HTTP' => [
        'verify' => '0',
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/sbin/sendmail -t -i ',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'devIPmask' => '',
        'displayErrors' => 0,
        'encryptionKey' => '7b6ca5a931bb6faaf60136c7106efe319c12cca9ec66bf44a7b28e13ee6bad366af35b579820f535f9ce53e5679c7e9c',
        'exceptionalErrors' => 4096,
        'sitename' => 'Lebenswurzel e.V.',
    ],
];
