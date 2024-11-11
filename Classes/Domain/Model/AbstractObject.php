<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Digicademy\CHFBase\Domain\Model\AbstractHeritage;
use Digicademy\CHFBase\Domain\Model\AgentRelation;
use Digicademy\CHFBase\Domain\Model\Extent;
use Digicademy\CHFBase\Domain\Model\Location;
use Digicademy\CHFBase\Domain\Model\LocationRelation;
use Digicademy\CHFBase\Domain\Model\Period;
use Digicademy\CHFMap\Domain\Model\Feature;
use Digicademy\CHFMap\Domain\Model\FeatureCollection;

defined('TYPO3') or die();

/**
 * Model for AbstractObject
 */
class AbstractObject extends AbstractHeritage
{
    /**
     * Title of this record
     * 
     * @var string
     */
    #[Validate([
        'validator' => 'StringLength',
        'options'   => [
            'maximum' => 255,
        ],
    ])]
    protected string $name = '';

    /**
     * Common alternative name used, i.e., as a search term
     * 
     * @var string
     */
    #[Validate([
        'validator' => 'StringLength',
        'options'   => [
            'maximum' => 255,
        ],
    ])]
    protected string $alternativeName = '';

    /**
     * List of extents relevant to this entry
     * 
     * @var ?ObjectStorage<Extent>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $extent = null;

    /**
     * Feature to use as geodata of this object (group)
     * 
     * @var Feature|FeatureCollection|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Feature|FeatureCollection|LazyLoadingProxy|null $geodata = null;

    /**
     * Room to list contained single objects
     * 
     * @var ?ObjectStorage<SingleObject>
     */
    #[Lazy()]
    protected ?ObjectStorage $object = null;

    /**
     * Room to list object-related events
     * 
     * @var ?ObjectStorage<Period>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $event = null;

    /**
     * Agent related to this record
     * 
     * @var ?ObjectStorage<AgentRelation>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $agentRelation = null;

    /**
     * Location related to this record
     * 
     * @var ?ObjectStorage<LocationRelation>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $locationRelation = null;

    /**
     * Place that this object (group) is part of
     * 
     * @var bool
     */
    #[Validate([
        'validator' => 'Boolean',
    ])]
    protected bool $isHistorical = false;

    /**
     * Place that this record is part of
     * 
     * @var Location|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Location|LazyLoadingProxy|null $parentLocation = null;

    /**
     * Construct object
     *
     * @param string $name
     * @param object $parentResource
     * @param string $uuid
     * @return AbstractObject
     */
    public function __construct(string $name, object $parentResource, string $uuid)
    {
        parent::__construct($parentResource, $uuid);
        $this->initializeObject();

        $this->setName($name);
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->extent ??= new ObjectStorage();
        $this->object ??= new ObjectStorage();
        $this->event ??= new ObjectStorage();
        $this->agentRelation ??= new ObjectStorage();
        $this->locationRelation ??= new ObjectStorage();
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get alternative name
     *
     * @return string
     */
    public function getAlternativeName(): string
    {
        return $this->alternativeName;
    }

    /**
     * Set alternative name
     *
     * @param string $alternativeName
     */
    public function setAlternativeName(string $alternativeName): void
    {
        $this->alternativeName = $alternativeName;
    }

    /**
     * Get extent
     *
     * @return ObjectStorage<Extent>
     */
    public function getExtent(): ?ObjectStorage
    {
        return $this->extent;
    }

    /**
     * Set extent
     *
     * @param ObjectStorage<Extent> $extent
     */
    public function setExtent(ObjectStorage $extent): void
    {
        $this->extent = $extent;
    }

    /**
     * Add extent
     *
     * @param Extent $extent
     */
    public function addExtent(Extent $extent): void
    {
        $this->extent?->attach($extent);
    }

    /**
     * Remove extent
     *
     * @param Extent $extent
     */
    public function removeExtent(Extent $extent): void
    {
        $this->extent?->detach($extent);
    }

    /**
     * Remove all extents
     */
    public function removeAllExtent(): void
    {
        $extent = clone $this->extent;
        $this->extent->removeAll($extent);
    }

    /**
     * Get geodata
     * 
     * @return Feature|FeatureCollection
     */
    public function getGeodata(): Feature|FeatureCollection
    {
        if ($this->geodata instanceof LazyLoadingProxy) {
            $this->geodata->_loadRealInstance();
        }
        return $this->geodata;
    }

    /**
     * Set geodata
     * 
     * @param Feature|FeatureCollection
     */
    public function setGeodata(Feature|FeatureCollection $geodata): void
    {
        $this->geodata = $geodata;
    }

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

    /**
     * Get event
     *
     * @return ObjectStorage<Period>
     */
    public function getEvent(): ?ObjectStorage
    {
        return $this->event;
    }

    /**
     * Set event
     *
     * @param ObjectStorage<Period> $event
     */
    public function setEvent(ObjectStorage $event): void
    {
        $this->event = $event;
    }

    /**
     * Add event
     *
     * @param Period $event
     */
    public function addEvent(Period $event): void
    {
        $this->event?->attach($event);
    }

    /**
     * Remove event
     *
     * @param Period $event
     */
    public function removeEvent(Period $event): void
    {
        $this->event?->detach($event);
    }

    /**
     * Remove all events
     */
    public function removeAllEvent(): void
    {
        $event = clone $this->event;
        $this->event->removeAll($event);
    }

    /**
     * Get agent relation
     *
     * @return ObjectStorage<AgentRelation>
     */
    public function getAgentRelation(): ?ObjectStorage
    {
        return $this->agentRelation;
    }

    /**
     * Set agent relation
     *
     * @param ObjectStorage<AgentRelation> $agentRelation
     */
    public function setAgentRelation(ObjectStorage $agentRelation): void
    {
        $this->agentRelation = $agentRelation;
    }

    /**
     * Add agent relation
     *
     * @param AgentRelation $agentRelation
     */
    public function addAgentRelation(AgentRelation $agentRelation): void
    {
        $this->agentRelation?->attach($agentRelation);
    }

    /**
     * Remove agent relation
     *
     * @param AgentRelation $agentRelation
     */
    public function removeAgentRelation(AgentRelation $agentRelation): void
    {
        $this->agentRelation?->detach($agentRelation);
    }

    /**
     * Remove all agent relations
     */
    public function removeAllAgentRelation(): void
    {
        $agentRelation = clone $this->agentRelation;
        $this->agentRelation->removeAll($agentRelation);
    }

    /**
     * Get location relation
     *
     * @return ObjectStorage<LocationRelation>
     */
    public function getLocationRelation(): ?ObjectStorage
    {
        return $this->locationRelation;
    }

    /**
     * Set location relation
     *
     * @param ObjectStorage<LocationRelation> $locationRelation
     */
    public function setLocationRelation(ObjectStorage $locationRelation): void
    {
        $this->locationRelation = $locationRelation;
    }

    /**
     * Add location relation
     *
     * @param LocationRelation $locationRelation
     */
    public function addLocationRelation(LocationRelation $locationRelation): void
    {
        $this->locationRelation?->attach($locationRelation);
    }

    /**
     * Remove location relation
     *
     * @param LocationRelation $locationRelation
     */
    public function removeLocationRelation(LocationRelation $locationRelation): void
    {
        $this->locationRelation?->detach($locationRelation);
    }

    /**
     * Remove all location relations
     */
    public function removeAllLocationRelation(): void
    {
        $locationRelation = clone $this->locationRelation;
        $this->locationRelation->removeAll($locationRelation);
    }

    /**
     * Get is historical
     *
     * @return bool
     */
    public function getIsHistorical(): bool
    {
        return $this->isHistorical;
    }

    /**
     * Set is historical
     *
     * @param bool $isHistorical
     */
    public function setIsHistorical(bool $isHistorical): void
    {
        $this->isHistorical = $isHistorical;
    }

    /**
     * Get parent location
     * 
     * @return Location
     */
    public function getParentLocation(): Location
    {
        if ($this->parentLocation instanceof LazyLoadingProxy) {
            $this->parentLocation->_loadRealInstance();
        }
        return $this->parentLocation;
    }

    /**
     * Set parent location
     * 
     * @param Location
     */
    public function setParentLocation(Location $parentLocation): void
    {
        $this->parentLocation = $parentLocation;
    }
}
