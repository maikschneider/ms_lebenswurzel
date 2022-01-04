<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['ms_lebenswurzel'] = 'EXT:ms_lebenswurzel/Configuration/RTE/Default.yaml';

/**
 * add own images and colors for login screen
 */
$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = serialize([
    'loginLogo' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Frontend/svg/lebenswurzel_logo.svg',
    'loginHighlightColor' => '#3E5F46',
    'loginBackgroundImage' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Backend/login_screen.jpg',
    'backendLogo' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Icons/backend.png',
    'backendFavicon' => 'EXT:ms_lebenswurzel/Resources/Public/Images/Icons/backend.png'
]);
