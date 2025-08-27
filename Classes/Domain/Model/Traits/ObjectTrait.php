<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model\Traits;

use Digicademy\CHFObject\Domain\Model\SingleObject;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

defined('TYPO3') or die();

/**
 * Trait for models to include an object property
 */
trait ObjectTrait
{
    /**
     * Room to list single objects as part of this location
     * 
     * @var ?ObjectStorage<SingleObject>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $object = null;

    /**
     * Get object
     *
     * @return ObjectStorage<SingleObject>
     */
    public function getObject(): ?ObjectStorage
    {
        return $this->object;
    }

    /**
     * Set object
     *
     * @param ObjectStorage<SingleObject> $object
     */
    public function setObject(ObjectStorage $object): void
    {
        $this->object = $object;
    }

    /**
     * Add object
     *
     * @param SingleObject $object
     */
    public function addObject(SingleObject $object): void
    {
        $this->object?->attach($object);
    }

    /**
     * Remove object
     *
     * @param SingleObject $object
     */
    public function removeObject(SingleObject $object): void
    {
        $this->object?->detach($object);
    }

    /**
     * Remove all objects
     */
    public function removeAllObject(): void
    {
        $object = clone $this->object;
        $this->object->removeAll($object);
    }
}
