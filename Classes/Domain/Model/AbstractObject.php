<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use Digicademy\CHFBase\Domain\Model\AbstractHeritage;
use Digicademy\CHFBase\Domain\Model\Location;
use Digicademy\CHFBase\Domain\Model\Period;
use Digicademy\CHFBase\Domain\Model\Traits\AgentRelationTrait;
use Digicademy\CHFBase\Domain\Model\Traits\ExtentTrait;
use Digicademy\CHFBase\Domain\Model\Traits\LocationRelationTrait;
use Digicademy\CHFMap\Domain\Model\Traits\CoordinatesTrait;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Attribute\ORM\Lazy;
use TYPO3\CMS\Extbase\Attribute\ORM\Cascade;
use TYPO3\CMS\Extbase\Attribute\Validate;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

defined('TYPO3') or die();

/**
 * Model for AbstractAbstractObject
 */
class AbstractAbstractObject extends AbstractHeritage
{
    use AgentRelationTrait;
    use ExtentTrait;
    use LocationRelationTrait;

    /**
     * Name of this record
     * 
     * @var string
     */
    #[Validate([
        'validator' => 'StringLength',
        'options'   => [
            'maximum' => 255,
        ],
    ])]
    protected string $title = '';

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
    protected string $alternativeTitle = '';

    /**
     * Room to list contained single objects
     * 
     * @var ObjectStorage<SingleObject>
     */
    #[Lazy()]
    protected ObjectStorage $object;

    /**
     * Room to list object-related events
     * 
     * @var ObjectStorage<Period>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ObjectStorage $event;

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
     * @param string $title
     * @return AbstractObject
     */
    public function __construct(string $title)
    {
        parent::__construct();
        $this->initializeObject();

        $this->setTitle($title);
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->extent = new ObjectStorage();
        $this->object = new ObjectStorage();
        $this->event = new ObjectStorage();
        $this->agentRelation = new ObjectStorage();
        $this->locationRelation = new ObjectStorage();
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Get alternative title
     *
     * @return string
     */
    public function getAlternativeTitle(): string
    {
        return $this->alternativeTitle;
    }

    /**
     * Set alternative title
     *
     * @param string $alternativeTitle
     */
    public function setAlternativeTitle(string $alternativeTitle): void
    {
        $this->alternativeTitle = $alternativeTitle;
    }

    /**
     * Get object
     *
     * @return ObjectStorage<SingleObject>
     */
    public function getObject(): ObjectStorage
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
        $this->object->attach($object);
    }

    /**
     * Remove object
     *
     * @param SingleObject $object
     */
    public function removeObject(SingleObject $object): void
    {
        $this->object->detach($object);
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
    public function getEvent(): ObjectStorage
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
        $this->event->attach($event);
    }

    /**
     * Remove event
     *
     * @param Period $event
     */
    public function removeEvent(Period $event): void
    {
        $this->event->detach($event);
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

# If CHF Map is available
if (ExtensionManagementUtility::isLoaded('chf_map')) {

    /**
     * Model for AbstractObject (with coordinates property)
     */
    class AbstractObject extends AbstractAbstractObject
    {
        use CoordinatesTrait;

        /**
         * Initialize object
         */
        public function initializeObject(): void
        {
            $this->extent = new ObjectStorage();
            $this->coordinates = new ObjectStorage();
            $this->object = new ObjectStorage();
            $this->event = new ObjectStorage();
            $this->agentRelation = new ObjectStorage();
            $this->locationRelation = new ObjectStorage();
        }
    }

# If no relevant extensions are available
} else {

    /**
     * Model for AbstractObject
     */
    class AbstractObject extends AbstractAbstractObject
    {}
}
