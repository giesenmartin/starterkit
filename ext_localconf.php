<?php
defined('TYPO3_MODE') || die();

/***************
 * Define TypoScript as content rendering template
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'starterkit/Configuration/TypoScript/';
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'starterkit/Configuration/TypoScript/ContentElement/';

/***************
 * Make the extension configuration accessible
 */
$extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
);
$bootstrapPackageConfiguration = $extensionConfiguration->get('starterkit');

/***************
 * PageTS
 */


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/ContentElement/All.tsconfig">');


// Add Content Elements
if (!$bootstrapPackageConfiguration['disablePageTsContentElements']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/ContentElement/All.tsconfig">');
}

// Add BackendLayouts for the BackendLayout DataProvider
if (!$bootstrapPackageConfiguration['disablePageTsBackendLayouts']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/Mod/WebLayout/BackendLayouts.tsconfig">');
}

// RTE
if (!$bootstrapPackageConfiguration['disablePageTsRTE']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/RTE.tsconfig">');
}

// TCEMAIN
if (!$bootstrapPackageConfiguration['disablePageTsTCEMAIN']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/TCEMAIN.tsconfig">');
}

// TCEFORM
if (!$bootstrapPackageConfiguration['disablePageTsTCEFORM']) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:starterkit/Configuration/TsConfig/Page/TCEFORM.tsconfig">');
}

/***************
 * Register custom EXT:form configuration
 */
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('form')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
        module.tx_form {
            settings {
                yamlConfigurations {
                    110 = EXT:starterkit/Configuration/Form/Setup.yaml
                }
            }
        }
        plugin.tx_form {
            settings {
                yamlConfigurations {
                    110 = EXT:starterkit/Configuration/Form/Setup.yaml
                }
            }
        }
    '));
}
