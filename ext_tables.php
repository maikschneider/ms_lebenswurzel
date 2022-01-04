<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        /**
         * Register icon
         */
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'ms_lebenswurzel_feature',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:ms_lebenswurzel/Resources/Public/Icons/ContentElements/Feature.svg']
        );
        $iconRegistry->registerIcon(
            'ms_lebenswurzel_person',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:ms_lebenswurzel/Resources/Public/Icons/ContentElements/Person.svg']
        );
    }
);
