<?php
defined('TYPO3_MODE') or die();

$_EXTKEY = $GLOBALS['_EXTKEY'] = 'ms_lebenswurzel';

/*

    Custom CE
    =========
    ms_lebenswurzel_feature

 */
// register CType in TCA
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.wizard.feature.title',
        'ms_lebenswurzel_feature', // ctype value
        'ms_lebenswurzel_feature' // icon-identifier
    ],
    'textmedia', // position in select box (=after textmedia)
    'after'
);
// set paletts and input fields
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_feature'] = array(
   'showitem' => '
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
         header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
         subheader;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:subheader_formlabel,
         bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
         assets,
        header_link;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.feature.button.link,
        rowDescription;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.feature.button.text,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
');
// override fields
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_feature']['columnsOverrides'] = array(
    'assets' => [
        'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.feature.icon'
    ],
    'rowDescription' => [
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 1024,
            'eval' => 'trim'
            )
    ]
);
// Register for hook to show preview of tt_content element of CType="ms_lebenswurzel_feature" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = \TYPO3\LebenswurzelBase\Hooks\FeaturePreviewRenderer::class;

/*

    Custom CE
    =========
    ms_lebenswurzel_person

 */
// register CType in TCA
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.wizard.person.title',
        'ms_lebenswurzel_person', // ctype value
        'ms_lebenswurzel_person' // icon-identifier
    ],
    'textmedia', // position in select box (=after textmedia)
    'after'
);
// set paletts and input fields
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_person'] = array(
    'showitem' => '
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
         header;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.person.name,
         subheader;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.person.jobtitle,
         bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
         assets;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.person.image,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        header_link;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.person.left.headline,
        rowDescription;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:tca.person.left.text,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
');
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_person']['columnsOverrides']['bodytext']['config']['enableRichtext'] = true;
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_person']['columnsOverrides']['header_link']['config']['renderType'] = '';
// set aspect ratio of image cropper
$GLOBALS['TCA']['tt_content']['types']['ms_lebenswurzel_person']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
    'default' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.default',
        'allowedAspectRatios' => [
            '1:1' => [
                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
                'value' => 1 / 1
            ],
        ]
    ],
];
// Register for hook to show preview of tt_content element of CType="ms_lebenswurzel_feature" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = \TYPO3\LebenswurzelBase\Hooks\PersonPreviewRenderer::class;


// Crop settings add Gallery
$GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
    'default' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.default',
        'allowedAspectRatios' => [
            'NaN' => [
                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                'value' => 0.0
            ],
            '3:2' => [
                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.3_2',
                'value' => 3 / 2
            ],
            '16:9' => [
                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
                'value' => 16 / 9
            ],
        ]
    ],
    'gallery' => [
        'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang.xlf:imageManipulation.gallery',
        'allowedAspectRatios' => [
            '3:2' => [
                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.3_2',
                'value' => 3 / 2
            ],
        ]
    ],
];


// restrict layout field to textmedia
$GLOBALS['TCA']['tt_content']['columns']['layout']['displayCond'] = [
    'OR' => [
        // 'FIELD:tx_gridelements_backend_layout:=:3',
        'FIELD:CType:=:textmedia',
        'FIELD:CType:=:menu_pages',
        'FIELD:CType:=:menu_subpages'
    ]
];

// add imageborder field (for menu_(sub)pages to hide page description)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'headers',
    '--linebreak--,imageborder',
    'after:header_layout'
);


// Extnd Textmedia Element for Button Fields
$temporaryColumns = array(
        'button_link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_link',
                        ],
                    ],
                ],
                'softref' => 'typolink'
            ]
        ],
        'button2_link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'title' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_link',
                        ],
                    ],
                ],
                'softref' => 'typolink'
            ]
        ],
        'button_class' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class.default', 'default'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class.success', 'success']
                ],
                'default' => 'default'
            ]
        ],
        'button2_class' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class.default', 'default'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class.success', 'success']
                ],
                'default' => 'default'
            ]
        ],
        'button_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_text',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ]
        ],
        'button2_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_text',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ]
        ],
        'button_position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_position',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_position.default', 'center'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_position.left', 'left'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_position.right', 'right']
                ],
                'default' => 'center'
            ]
        ],
        'button_icon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.default', ''],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.arrow', '<span class="icon icon-arrow"></span>'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.heart', '<span class="icon icon-heart"></span>'],
                    [
                        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.plane',
                        '<span class="icon icon-plane"></span>'
                    ],
                    [
                        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.download',
                        '<span class="icon icon-download"></span>'
                    ]
                ],
                'default' => ''
            ]
        ],
        'button2_icon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.default', ''],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.arrow', '<span class="icon icon-arrow"></span>'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.heart', '<span class="icon icon-heart"></span>'],
                    ['LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.plane', '<span class="icon icon-plane"></span>'],
                    [
                        'LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon.download',
                        '<span class="icon icon-download"></span>'
                    ]
                ],
                'default' => ''
            ]
        ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $temporaryColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--palette--;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:palette.buttons;buttons',
    'textmedia',
    'after:bodytext'
);
$GLOBALS['TCA']['tt_content']['palettes']['buttons'] = [
    'showitem' => '
        button_link;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_link,
        button_text;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_text,
        button_icon;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_icon,
        button_class;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_class,
        --linebreak--,
        button2_link;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button2_link,
        button2_text;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button2_text,
        button2_icon;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button2_icon,
        button2_class;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button2_class,
        --linebreak--,
        button_position;LLL:EXT:ms_lebenswurzel/Resources/Private/Language/locallang_be.xlf:button_position,
    ',
];
