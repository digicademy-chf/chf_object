<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model\Traits;

use Digicademy\CHFObject\Domain\Model\ObjectGroup;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

defined('TYPO3') or die();

/**
 * Trait for models to include an object-group property
 */
trait ObjectGroupTrait
{
    /**
     * Room to list object groups as part of this location
     * 
     * @var ?ObjectStorage<ObjectGroup>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $objectGroup = null;

    /**
     * Get object group
     *
     * @return ObjectStorage<ObjectGroup>
     */
    public function getObjectGroup(): ?ObjectStorage
    {
        return $this->objectGroup;
    }

    /**
     * Set object group
     *
     * @param ObjectStorage<ObjectGroup> $objectGroup
     */
    public function setObjectGroup(ObjectStorage $objectGroup): void
    {
        $this->objectGroup = $objectGroup;
    }

    /**
     * Add object group
     *
     * @param ObjectGroup $objectGroup
     */
    public function addObjectGroup(ObjectGroup $objectGroup): void
    {
        $this->objectGroup?->attach($objectGroup);
    }

    /**
     * Remove object group
     *
     * @param ObjectGroup $objectGroup
     */
    public function removeObjectGroup(ObjectGroup $objectGroup): void
    {
        $this->objectGroup?->detach($objectGroup);
    }

    /**
     * Remove all object groups
     */
    public function removeAllObjectGroup(): void
    {
        $objectGroup = clone $this->objectGroup;
        $this->objectGroup->removeAll($objectGroup);
    }
}
