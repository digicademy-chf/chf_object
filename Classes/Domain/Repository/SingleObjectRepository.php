<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Repository;

use Digicademy\CHFBase\Domain\Repository\Traits\StoragePageAgnosticTrait;
use Digicademy\CHFObject\Domain\Model\SingleObject;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

defined('TYPO3') or die();

/**
 * Repository for SingleObject
 * 
 * @extends Repository<SingleObject>
 */
class SingleObjectRepository extends Repository
{
    use StoragePageAgnosticTrait;

    protected $defaultOrderings = [
        'sorting'         => QueryInterface::ORDER_ASCENDING,
        'isHighlight'     => QueryInterface::ORDER_ASCENDING,
        'name'            => QueryInterface::ORDER_ASCENDING,
        'alternativeName' => QueryInterface::ORDER_ASCENDING,
    ];
}
