<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * LabelTag and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add column 'asLabelOfSingleObject'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_tag',
    [
        'asLabelOfSingleObject' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfSingleObject',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfSingleObject.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfobject_domain_model_single_object',
                'foreign_table_where' => 'AND {#tx_chfobject_domain_model_single_object}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfobject_domain_model_single_object_tag_label_mm',
                'MM_opposite_field' => 'label',
                'MM_match_fields' => [
                    'fieldname' => 'asLabelOfSingleObject',
                ],
                'size' => 5,
                'autoSizeMax' => 10,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
                'readOnly' => true,
            ],
        ],
    ]
);

// Add column 'asLabelOfObjectGroup'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_tag',
    [
        'asLabelOfObjectGroup' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfObjectGroup',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfObjectGroup.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfobject_domain_model_object_group',
                'foreign_table_where' => 'AND {#tx_chfobject_domain_model_object_group}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfobject_domain_model_object_group_tag_label_mm',
                'MM_opposite_field' => 'label',
                'MM_match_fields' => [
                    'fieldname' => 'asLabelOfObjectGroup',
                ],
                'size' => 5,
                'autoSizeMax' => 10,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
                'readOnly' => true,
            ],
        ],
    ]
);
