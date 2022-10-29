<?php

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (new \B13\Container\Tca\ContainerConfiguration(
        'container-features',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.features.title',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.features.description',
        [
            [
                [
                    'name' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.features.columnName',
                    'colPos' => 11,
                    'allowed' => ['CType' => 'ms_lebenswurzel_feature']
                ]
            ],
        ]
    )
    )
        ->setIcon('EXT:ms_lebenswurzel/Resources/Public/Icons/Gridelements/Features.svg')
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'style', 'container-features', 'after:header');