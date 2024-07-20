<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * ContentElement and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add plugin 'ObjectGallery'
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'CHFObject',
    'ObjectGallery',
    'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:plugin.objectGallery',
    'tx-chfobject-plugin-object-gallery',
    'heritage',
    'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:plugin.objectGallery.description',
);

// Add plugin 'ObjectContext'
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'CHFObject',
    'ObjectContext',
    'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:plugin.objectContext',
    'tx-chfobject-plugin-object-context',
    'heritage',
    'LLL:EXT:chf_object/Resources/Private/Language/locallang.xlf:plugin.objectContext.description',
);
