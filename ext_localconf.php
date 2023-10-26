<?php

defined('TYPO3') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AjaxRequests',
    'List',
    [
        \Passionweb\AjaxRequests\Controller\ProductController::class => 'list'
    ],
    // non-cacheable actions
    [
        \Passionweb\AjaxRequests\Controller\ProductController::class => 'list',
    ]
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AjaxRequests',
    'Filter',
    [
        \Passionweb\AjaxRequests\Controller\ProductController::class => 'filter'
    ],
    // non-cacheable actions
    [
        \Passionweb\AjaxRequests\Controller\ProductController::class => 'filter',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        ajaxrequests_list {
                            iconIdentifier = ajaxrequests-list
                            title = LLL:EXT:ajax_requests/Resources/Private/Language/locallang_db.xlf:plugin_ajaxrequests_filter.name
                            description = LLL:EXT:ajax_requests/Resources/Private/Language/locallang_db.xlf:plugin_ajaxrequests_filter.description
                            tt_content_defValues {
                                CType = list
                                list_type = ajaxrequests_list
                            }
                        }
                    }
                    show = *
                }
           }'
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'ajaxrequests-list',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:ajax_requests/Resources/Public/Icons/Extension.png']
);
