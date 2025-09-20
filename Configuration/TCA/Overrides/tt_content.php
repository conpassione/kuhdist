<?php

declare(strict_types=1);
defined('TYPO3') or die();

use B13\Container\Tca\ContainerConfiguration;
use B13\Container\Tca\Registry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

call_user_func(static function (): void {
    // Defaulteinstellungen für Feld layout löschen
    $GLOBALS['TCA']['tt_content']['columns']['layout']['config']['items'] = [];
    unset($GLOBALS['TCA']['tt_content']['columns']['layout']['config']['default']);

    // Defaulteinstellungen für Feld frame_class löschen
    $GLOBALS['TCA']['tt_content']['columns']['frame_class']['config']['items'] = [];
    unset($GLOBALS['TCA']['tt_content']['columns']['frame_class']['config']['default']);

    // Zusätzliche Gruppe im newContentWizard erstellen
    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'z-cpextensions',
        'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:contentwizard.z-cpextensions.groupLabel',
        'after:forms'
    );
    // Zusätzliche Gruppe im newContentWizard erstellen
    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'z-cplayout',
        'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:contentwizard.z-cplayout.groupLabel',
        'after:default'
    );

    // TCA für header-Field überschreiben, damit der RTE zum Editieren verwendet werden kann
    // siehe: https://daniel-siepmann.de/typo3-rte-for-input-fields.html
    $GLOBALS['TCA']['tt_content']['columns']['header']['config'] = [
        'type' => 'text',
        'rows' => 1,
        'enableRichtext' => true,
        'richtextConfiguration' => 'CpMinimal'
    ];
    $GLOBALS['TCA']['pages']['columns']['subtitle']['config'] = [
        'type' => 'text',
        'rows' => 1,
        'enableRichtext' => true,
        'richtextConfiguration' => 'CpMinimal'
    ];

    /* containers */
    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'cp-1col', // CType
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.1col', // label
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.1col.description', // description
            [
                [
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.1col.col201',
                        'colPos' => 201,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                ],
            ] // grid configuration
        )
        )
            // set an optional icon configuration
            ->setIcon('tx-conpassione-cp-1col')
            ->setGroup('z-cplayout')
    );

    $GLOBALS['TCA']['tt_content']['types']['cp-1col']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
        ';

    /* containers */
    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'cp-2cols5050', // CType
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols5050', // label
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols5050.description', // description
            [
                [
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col201',
                        'colPos' => 201,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col202',
                        'colPos' => 202,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ]
                ],
            ] // grid configuration
        )
        )
            // set an optional icon configuration
            ->setIcon('tx-conpassione-cp-2cols5050')
            ->setGroup('z-cplayout')
    );
    $GLOBALS['TCA']['tt_content']['types']['cp-2cols5050']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
        ';

    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'cp-2cols3366', // CType
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols3366', // label
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols3366.description', // description
            [
                [
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col201',
                        'colPos' => 201,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col202',
                        'colPos' => 202,
                        'colspan' => 2,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ]
                ],
            ] // grid configuration
        )
        )
            // set an optional icon configuration
            ->setIcon('tx-conpassione-cp-2cols3366')
            ->setGroup('z-cplayout')
    );
    $GLOBALS['TCA']['tt_content']['types']['cp-2cols3366']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
        ';

    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'cp-2cols6633', // CType
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols6633', // label
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols6633.description', // description
            [
                [
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col201',
                        'colPos' => 201,
                        'colspan' => 2,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.2cols.col202',
                        'colPos' => 202,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                ],
            ] // grid configuration
        )
        )
            // set an optional icon configuration
            ->setIcon('tx-conpassione-cp-2cols6633')
            ->setGroup('z-cplayout')
    );
    $GLOBALS['TCA']['tt_content']['types']['cp-2cols6633']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
        ';

    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'cp-3cols', // CType
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.3cols', // label
            'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.3cols.description', // description
            [
                [
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.3cols.col201',
                        'colPos' => 201,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.3cols.col202',
                        'colPos' => 202,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ],
                    [
                        'name' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:container.3cols.col203',
                        'colPos' => 203,
                        'disallowed' => ['CType' => 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols']
                    ]
                ],
            ] // grid configuration
        )
        )
            // set an optional icon configuration
            ->setIcon('tx-conpassione-cp-3cols')
            ->setGroup('z-cplayout')
    );
    $GLOBALS['TCA']['tt_content']['types']['cp-3cols']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
        ';

    $additionalColumns = [
        'sectionlayout' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.sectionlayout',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => '',
                'items' => [
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.sectionlayout.item0',
                        'value' => '',
                    ],
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.sectionlayout.item1',
                        'value' => 'breakout',
                    ],
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.sectionlayout.item2',
                        'value' => 'full-width',
                    ],
                ]
            ]
        ],
        'contentlayout' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.contentlayout',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => '',
                'items' => [
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.contentlayout.item0',
                        'value' => '',
                    ],
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.contentlayout.item1',
                        'value' => 'breakout',
                    ],
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:tt_content.column.contentlayout.item2',
                        'value' => 'full-width',
                    ],
                ]
            ]
        ],
    ];
    ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

    $sections = 'cp-1col,cp-2cols5050,cp-2cols3366,cp-2cols6633,cp-3cols';
    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'cplayout',
        'sectionlayout,contentlayout'
    );
    // Zeilenumbruch einfügen 'sectionlayout,contentlayout,--linebreak--,imagecols'

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--palette--;Layout;cplayout',
        $sections,
        'after:sectionIndex'
    );
});
