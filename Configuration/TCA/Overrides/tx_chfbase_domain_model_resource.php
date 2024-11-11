<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * ObjectResource and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add select item 'objectResource'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_resource', 'type',
    [
        'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.objectResource.type.objectResource',
        'value' => 'objectResource',
    ]
);

// Add columns 'allSingleObjects' and 'allObjectGroups'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_resource',
    [
        'allSingleObjects' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.objectResource.allSingleObjects',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.objectResource.allSingleObjects.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfobject_domain_model_single_object',
                'foreign_field' => 'parentResource',
                'foreign_sortby' => 'sorting',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => false,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
        'allObjectGroups' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.objectResource.allObjectGroups',
            'description' => 'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:object.objectResource.allObjectGroups.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfobject_domain_model_object_group',
                'foreign_field' => 'parentResource',
                'foreign_sortby' => 'sorting',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => false,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
    ]
);

// Add type 'objectResource' and its 'showitem' list
$GLOBALS['TCA']['tx_chfbase_domain_model_resource']['types'] += ['objectResource' => [
   'showitem' => 'type,--palette--;;titleLangCodeDescriptionGlossary,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.structured,allSingleObjects,allObjectGroups,allAgents,allLocations,allPeriods,allTags,allKeywords,allRelations,allFileGroups,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.placement,--palette--;;iriUuidSameAs,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.editorial,--palette--;;publicationDateRevisionDateRevisionNumberEditorialNote,--palette--;;authorshipRelationLicenceRelation,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import,--palette--;;importOriginImportState,',
]];
