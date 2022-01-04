<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {
    /**
     * Temporary variables
     */
    $extensionKey = 'ms_lebenswurzel';

    /**
     * Default PageTS for LebenswurzelBase
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/PageTS/All.txt',
        'Lebenswurzel-base'
    );
});


$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
    'large' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.large',
        'allowedAspectRatios' => [
            '7 : 2' => [
                'title' => '7 : 2',
                'value' => 7 / 2
            ]
        ]
    ],
    'medium' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.medium',
        'allowedAspectRatios' => [
            '5 : 2' => [
                'title' => '5 : 2',
                'value' => 5 / 2
            ]
        ]
    ],
    'preview' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.preview',
        'allowedAspectRatios' => [
            '16 : 6' => [
                'title' => '16 : 9',
                'value' => 16 / 9
            ]
        ]
    ],
];

// extend pages for color class
$temporaryColumns = array(
    'color_class' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:color_class',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:color_class.default', 'default'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:color_class.orange', 'orange']
                ],
                'default' => 'default'
            ]
        ],
    );

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    $temporaryColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--palette--;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:palette.style;style',
    '1',
    'before:layout'
);

$GLOBALS['TCA']['pages']['palettes']['style'] = [
    'showitem' => '
        color_class;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:color_class,
    ',
];
