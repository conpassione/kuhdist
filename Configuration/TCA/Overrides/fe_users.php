<?php

declare(strict_types=1);
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function (): void {
    // fe_users per default nach Name anstatt uid sortieren
    if (ExtensionManagementUtility::isLoaded('felogin')) {
        $GLOBALS['TCA']['fe_users'] = array_replace_recursive(
            $GLOBALS['TCA']['fe_users'],
            [
                'ctrl' => [
                    'default_sortby' => 'status desc,last_name,first_name',
                    'label' => 'last_name',
                    'label_alt' => 'first_name,city,mobile,email,status',
                    'label_alt_force' => true
                ]
            ]
        );
    }
    $additionalColumns = [
        'mobile' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.mobile',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim'
            ]
        ],
        'email2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.email2',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim'
            ]
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => '1',
                'maxItems' => '1',
                'items' => [
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.status.0.label',
                        'value' => 0,
                    ],
                    [
                        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.status.1.label',
                        'value' => 1,
                    ]
                ]
            ]
        ]
    ];
    ExtensionManagementUtility::addTCAcolumns('fe_users', $additionalColumns);
    ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'mobile', '', 'after:telephone');
    ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'email2', '', 'after:email');
    ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'status', '', 'after:password');

    /* Add additional Items to status field */
    /*    $myitem = [
            'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:fe_users.column.status.2.label',
            'value' => 2,
        ];
        $GLOBALS['TCA']['fe_users']['columns']['status']['config']['items'][] = $myitem;
        $GLOBALS['TCA']['fe_users']['columns']['status']['config']['items'][0]['label'] = 'overwritetest';*/
});
