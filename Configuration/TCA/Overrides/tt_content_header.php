<?php

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (new \B13\Container\Tca\ContainerConfiguration(
        'container-header',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.header.title',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.header.description',
        [
            [
                [
                    'name' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.header.columnName',
                    'colPos' => 11,
                    'allowed' => ['CType' => 'textmedia']
                ]
            ],
        ]
    )
    )
        ->setIcon('EXT:ms_lebenswurzel/Resources/Public/Icons/Gridelements/Header.svg')
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'assets', 'container-header', 'after:header');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'style', 'container-header', 'after:header');