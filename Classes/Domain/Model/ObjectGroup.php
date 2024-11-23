<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use Digicademy\CHFMap\Domain\Model\MapResource;

defined('TYPO3') or die();

/**
 * Model for ObjectGroup
 */
class ObjectGroup extends AbstractObject
{
    /**
     * Map of this object group
     * 
     * @var MapResource|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected MapResource|LazyLoadingProxy|null $floorPlan = null;

    /**
     * Construct object
     *
     * @param string $name
     * @param ObjectResource $parentResource
     * @param string $uuid
     * @return ObjectGroup
     */
    public function __construct(string $name, ObjectResource $parentResource, string $uuid)
    {
        parent::__construct($name, $parentResource, $uuid);
    }

    /**
     * Get floor plan
     * 
     * @return MapResource
     */
    public function getFloorPlan(): MapResource
    {
        if ($this->floorPlan instanceof LazyLoadingProxy) {
            $this->floorPlan->_loadRealInstance();
        }
        return $this->floorPlan;
    }

    /**
     * Set floor plan
     * 
     * @param MapResource
     */
    public function setFloorPlan(MapResource $floorPlan): void
    {
        $this->floorPlan = $floorPlan;
    }
}
