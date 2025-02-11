<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

defined('TYPO3') or die();

/**
 * Model for ObjectGroup
 */
class ObjectGroup extends AbstractObject
{
    /**
     * Map of this object group
     * 
     * @var FileReference|LazyLoadingProxy|null
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected FileReference|LazyLoadingProxy|null $floorPlan = null;

    /**
     * Construct object
     *
     * @param string $name
     * @param ObjectResource $parentResource
     * @return ObjectGroup
     */
    public function __construct(string $name, ObjectResource $parentResource)
    {
        parent::__construct($name, $parentResource);
    }

    /**
     * Get floor plan
     * 
     * @return FileReference
     */
    public function getFloorPlan(): FileReference
    {
        if ($this->floorPlan instanceof LazyLoadingProxy) {
            $this->floorPlan->_loadRealInstance();
        }
        return $this->floorPlan;
    }

    /**
     * Set floor plan
     * 
     * @param FileReference
     */
    public function setFloorPlan(FileReference $floorPlan): void
    {
        $this->floorPlan = $floorPlan;
    }
}
