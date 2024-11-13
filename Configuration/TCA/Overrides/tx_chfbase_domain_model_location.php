<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * Location and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add columns 'object' and 'object_group'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_location',
    [
        'object' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.location.object',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.location.object.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfobject_domain_model_single_object',
                'foreign_field' => 'parent_location',
                'enableCascadingDelete' => false,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
        'object_group' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.location.objectGroup',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.location.objectGroup.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfobject_domain_model_object_group',
                'foreign_field' => 'parent_location',
                'enableCascadingDelete' => false,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
    ]
);
