<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Digicademy\CHFBase\Domain\Model\AbstractResource;
use Digicademy\CHFGloss\Domain\Model\GlossaryResource;

defined('TYPO3') or die();

/**
 * Model for ObjectResource
 */
class ObjectResource extends AbstractResource
{
    /**
     * Resource to use as a glossary for this resource
     * 
     * @var GlossaryResource|LazyLoadingProxy
     */
    #[Lazy()]
    protected GlossaryResource|LazyLoadingProxy $glossary;

    /**
     * List of all object groups compiled in this resource
     * 
     * @var ?ObjectStorage<ObjectGroup>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $allObjectGroups = null;

    /**
     * List of all single objects compiled in this resource
     * 
     * @var ?ObjectStorage<SingleObject>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $allSingleObjects = null;

    /**
     * Construct object
     *
     * @param string $uuid
     * @param string $langCode
     * @return ObjectResource
     */
    public function __construct(string $uuid, string $langCode)
    {
        parent::__construct($uuid, $langCode);
        $this->initializeObject();

        $this->setType('objectResource');
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->allObjectGroups ??= new ObjectStorage();
        $this->allSingleObjects ??= new ObjectStorage();
    }

    /**
     * Get glossary
     * 
     * @return GlossaryResource
     */
    public function getGlossary(): GlossaryResource
    {
        if ($this->glossary instanceof LazyLoadingProxy) {
            $this->glossary->_loadRealInstance();
        }
        return $this->glossary;
    }

    /**
     * Set glossary
     * 
     * @param GlossaryResource
     */
    public function setGlossary(GlossaryResource $glossary): void
    {
        $this->glossary = $glossary;
    }

    /**
     * Get all object groups
     *
     * @return ObjectStorage<ObjectGroup>
     */
    public function getAllObjectGroups(): ?ObjectStorage
    {
        return $this->allObjectGroups;
    }

    /**
     * Set all object groups
     *
     * @param ObjectStorage<ObjectGroup> $allObjectGroups
     */
    public function setAllObjectGroups(ObjectStorage $allObjectGroups): void
    {
        $this->allObjectGroups = $allObjectGroups;
    }

    /**
     * Add all object groups
     *
     * @param ObjectGroup $allObjectGroups
     */
    public function addAllObjectGroups(ObjectGroup $allObjectGroups): void
    {
        $this->allObjectGroups?->attach($allObjectGroups);
    }

    /**
     * Remove all object groups
     *
     * @param ObjectGroup $allObjectGroups
     */
    public function removeAllObjectGroups(ObjectGroup $allObjectGroups): void
    {
        $this->allObjectGroups?->detach($allObjectGroups);
    }

    /**
     * Remove all all object groups
     */
    public function removeAllAllObjectGroups(): void
    {
        $allObjectGroups = clone $this->allObjectGroups;
        $this->allObjectGroups->removeAll($allObjectGroups);
    }

    /**
     * Get all single objects
     *
     * @return ObjectStorage<SingleObject>
     */
    public function getAllSingleObjects(): ?ObjectStorage
    {
        return $this->allSingleObjects;
    }

    /**
     * Set all single objects
     *
     * @param ObjectStorage<SingleObject> $allSingleObjects
     */
    public function setAllSingleObjects(ObjectStorage $allSingleObjects): void
    {
        $this->allSingleObjects = $allSingleObjects;
    }

    /**
     * Add all single objects
     *
     * @param SingleObject $allSingleObjects
     */
    public function addAllSingleObjects(SingleObject $allSingleObjects): void
    {
        $this->allSingleObjects?->attach($allSingleObjects);
    }

    /**
     * Remove all single objects
     *
     * @param SingleObject $allSingleObjects
     */
    public function removeAllSingleObjects(SingleObject $allSingleObjects): void
    {
        $this->allSingleObjects?->detach($allSingleObjects);
    }

    /**
     * Remove all all single objects
     */
    public function removeAllAllSingleObjects(): void
    {
        $allSingleObjects = clone $this->allSingleObjects;
        $this->allSingleObjects->removeAll($allSingleObjects);
    }
}
