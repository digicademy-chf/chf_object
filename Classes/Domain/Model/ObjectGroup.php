<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
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
     * @var MapResource|LazyLoadingProxy
     */
    #[Lazy()]
    protected MapResource|LazyLoadingProxy $objectGroupPlan;

    /**
     * Construct object
     *
     * @param object $parentResource
     * @param string $uuid
     * @param string $name
     * @return ObjectGroup
     */
    public function __construct(object $parentResource, string $uuid, string $name)
    {
        parent::__construct($parentResource, $uuid, $name);
        $this->initializeObject();
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->objectGroupPlan = new LazyLoadingProxy();
    }

    /**
     * Get object group plan
     * 
     * @return MapResource
     */
    public function getObjectGroupPlan(): MapResource
    {
        if ($this->objectGroupPlan instanceof LazyLoadingProxy) {
            $this->objectGroupPlan->_loadRealInstance();
        }
        return $this->objectGroupPlan;
    }

    /**
     * Set object group plan
     * 
     * @param MapResource
     */
    public function setObjectGroupPlan(MapResource $objectGroupPlan): void
    {
        $this->objectGroupPlan = $objectGroupPlan;
    }
}
