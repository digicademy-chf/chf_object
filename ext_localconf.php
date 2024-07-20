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

// Register 'ObjectGallery' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'ObjectGallery',
    [
        SingleObjectController::class => 'index',
        SingleObjectController::class => 'show',
    ],
);

// Register 'ObjectContext' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'ObjectContext',
    [
        ObjectGroupController::class => 'index',
        ObjectGroupController::class => 'show',
        SingleObjectController::class => 'index',
        SingleObjectController::class => 'show',
    ],
);
