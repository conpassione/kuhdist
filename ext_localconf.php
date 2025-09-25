<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\RFCValidation;

defined('TYPO3') or die();


// Spam-Protection: E-Mail Validators
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['validators'] = [
    RFCValidation::class,
    DNSCheckValidation::class
];

// CK-Editor Konfiguration laden
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefault'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefault'] = 'EXT:kuhdist/Configuration/RTE/CpDefault.yaml';
}

// CK-Editor Konfiguration laden mit Code-Auszeichnung
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefaultCode'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefaultCode'] = 'EXT:kuhdist/Configuration/RTE/CpDefaultCode.yaml';
}

// CK-Editor Konfiguration laden mit Tablellen-Auszeichnung
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefaultTable'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpDefaultTable'] = 'EXT:kuhdist/Configuration/RTE/CpDefaultTable.yaml';
}

// CK-Editor minimale Konfiguration laden
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpMinimal'])) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['CpMinimal'] = 'EXT:kuhdist/Configuration/RTE/CpMinimal.yaml';
}

// Add custom translations overriding cpdefault labels
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:frontend/Resources/Private/Language/locallang_tca.xlf'][] = 'EXT:kuhdist/Resources/Private/Language/customtca.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:frontend/Resources/Private/Language/locallang_tca.xlf'][] = 'EXT:kuhdist/Resources/Private/Language/de.customtca.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['fr']['EXT:frontend/Resources/Private/Language/locallang_tca.xlf'][] = 'EXT:kuhdist/Resources/Private/Language/fr.customtca.xlf';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['it']['EXT:frontend/Resources/Private/Language/locallang_tca.xlf'][] = 'EXT:kuhdist/Resources/Private/Language/it.customtca.xlf';

// Define TypoScript as content rendering template.
// This is normally set in Fluid Styled Content.
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'kuhdist/Configuration/TypoScript/Rendering/';
