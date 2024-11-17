<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

defined('TYPO3') or die();

// Extension-provided icons
return [
    'tx-chfobject' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_object/Resources/Public/Icons/Extension.svg',
    ],
    'tx-chfobject-table-single-object' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_object/Resources/Public/Icons/TableSingleObject.svg',
    ],
    'tx-chfobject-table-object-group' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_object/Resources/Public/Icons/TableObjectGroup.svg',
    ],
    'tx-chfobject-plugin-exhibition' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_object/Resources/Public/Icons/PluginExhibition.svg',
    ],
    'tx-chfobject-plugin-context' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_object/Resources/Public/Icons/PluginContext.svg',
    ],
];
