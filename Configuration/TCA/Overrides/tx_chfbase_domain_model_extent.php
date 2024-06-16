<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * Extent and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add select item group 'chfObject'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup('tx_chfbase_domain_model_extent', 'type',
    'chfObject',
    'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.chfObject'
);

// Add select item 'height'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.height',
        'value' => 'height',
        'group' => 'chfObject',
    ]
);

// Add select item 'width'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.width',
        'value' => 'width',
        'group' => 'chfObject',
    ]
);

// Add select item 'diameter'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.diameter',
        'value' => 'diameter',
        'group' => 'chfObject',
    ]
);

// Add select item 'inventoryNumber'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.inventoryNumber',
        'value' => 'inventoryNumber',
        'group' => 'chfObject',
    ]
);

// Add select item 'positionOnPlan'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.positionOnPlan',
        'value' => 'positionOnPlan',
        'group' => 'chfObject',
    ]
);

// Add select item 'number'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.issue',
        'value' => 'number',
        'group' => 'chfObject',
    ]
);

// Add select item 'panelRow'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.panelRow',
        'value' => 'panelRow',
        'group' => 'chfObject',
    ]
);

// Add select item 'panelColumn'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.extent.type.panelColumn',
        'value' => 'panelColumn',
        'group' => 'chfObject',
    ]
);
