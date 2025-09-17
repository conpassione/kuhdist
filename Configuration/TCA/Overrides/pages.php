<?php

declare(strict_types=1);
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function (): void {
    // clear the default items for "layout" field to allow for consistent adding of additional items with addItems in
    // PageTSConfig (instead of a combination of altLabels and addItems)
    $GLOBALS['TCA']['pages']['columns']['layout']['config']['items'] = [];
    unset($GLOBALS['TCA']['pages']['columns']['layout']['config']['default']);

    // STAFF zusätzliche Icons für Folder-Seiten ... enthält Plugin Feld
    $GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
        'label' => 'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:pagetype.staff.label',
        'icon' => 'tx-conpassione-staff',
        'value' => 'staff'
    ];
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes']['contains-staff'] = 'tx-conpassione-staff';


    // Add group 'conpassione' to Page Types Selection
    ExtensionManagementUtility::addTcaSelectItemGroup(
        'pages',
        'doktype',
        'conpassione',
        'LLL:EXT:kuhdist/Resources/Private/Language/locallang_db.xlf:pagewizard.conpassione.groupLabel',
        'after:default'
    );

    // Bugfix for content-blocks
    // List all pages to add the standard fields
    $doktypes = '36650001,36650011,36650012';

    // update TCA (add abstract) to unify BE for Standard and Custom Pages
    ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'abstract',
        $doktypes,
        'before:keywords'
    );

    // add fields to palette editorial
    ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'editorial',
        'author, author_email, lastUpdated'
    );

    // add editorial palette to pages
    ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.editorial;editorial',
        $doktypes,
        'after:palette:metatags'
    );

    // add media palette to pages
    ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'media',
        $doktypes,
        'before:tsconfig_includes'
    );

    // add fields to palette layout
    ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'layout',
        'layout,newUntil'
    );

    // add layout palette to pages
    ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.layout;layout',
        $doktypes,
        'before:palette:backend_layout'
    );
});
