<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use Digicademy\CHFObject\Controller\ObjectGroupController;
use Digicademy\CHFObject\Controller\SingleObjectController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register 'Gallery' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'Gallery',
    [
        SingleObjectController::class => 'index, show',
    ],
    [], // None of the actions are non-cacheable
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

// Register 'Context' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'Context',
    [
        ObjectGroupController::class => 'index, show',
        SingleObjectController::class => 'index, show',
    ],
    [], // None of the actions are non-cacheable
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
