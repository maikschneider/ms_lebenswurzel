<?php

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (new \B13\Container\Tca\ContainerConfiguration(
        'container-roadmap',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.roadmap.title',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.roadmap.description',
        [
            [
                [
                    'name' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.roadmap.columnName.top',
                    'colPos' => 11,
                    'allowed' => ['CType' => 'textmedia']
                ]
            ],
            [
                [
                    'name' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.roadmap.columnName.bottom',
                    'colPos' => 21,
                    'allowed' => ['CType' => 'textmedia']
                ]
            ],
        ]
    )
    )
        ->setIcon('EXT:ms_lebenswurzel/Resources/Public/Icons/Gridelements/Roadmap.svg')
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'style', 'container-roadmap',
    'after:header');

$GLOBALS['TCA']['tt_content']['types']['container-roadmap']['columnsOverrides']['style']['config']['items'] = [
    ['Default', 'default'],
    ['Green', 'green'],
];
