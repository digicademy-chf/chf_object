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

// Add columns 'as_label_of_single_object' and 'as_label_of_object_group'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_tag',
    [
        'as_label_of_single_object' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfSingleObject',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfSingleObject.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfobject_domain_model_singleobject',
                'foreign_table_where' => 'AND {#tx_chfobject_domain_model_singleobject}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfobject_domain_model_singleobject_tag_label_mm',
                'MM_opposite_field' => 'label',
                'multiple' => 1,
                'size' => 5,
                'autoSizeMax' => 10,
            ],
        ],
        'as_label_of_object_group' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfObjectGroup',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfObjectGroup.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfobject_domain_model_objectgroup',
                'foreign_table_where' => 'AND {#tx_chfobject_domain_model_objectgroup}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfobject_domain_model_objectgroup_tag_label_mm',
                'MM_opposite_field' => 'label',
                'multiple' => 1,
                'size' => 5,
                'autoSizeMax' => 10,
            ],
        ],
    ]
);
