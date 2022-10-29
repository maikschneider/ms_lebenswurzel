<?php

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (new \B13\Container\Tca\ContainerConfiguration(
        'container-accordion',
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.accordion.title',
        '',
        [
            [
                [
                    'name' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:gridelements.accordion.elements',
                    'colPos' => 11
                ]
            ],
        ]
    )
    )
        ->setIcon('EXT:ms_lebenswurzel/Resources/Public/Icons/Gridelements/Accordion.svg')
);
