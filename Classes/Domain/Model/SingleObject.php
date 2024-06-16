<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

defined('TYPO3') or die();

/**
 * Model for SingleObject
 */
class SingleObject extends AbstractObject
{
    /**
     * Object group that this single object is part of
     * 
     * @var ObjectGroup|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected ObjectGroup|LazyLoadingProxy|null $parentObjectGroup = null;

    /**
     * Single object that this single object is part of
     * 
     * @var SingleObject|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected SingleObject|LazyLoadingProxy|null $parentSingleObject = null;

    /**
     * Schematic related to the first media file
     * 
     * @var FileReference|LazyLoadingProxy|null
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected FileReference|LazyLoadingProxy|null $mediaSchema = null;

    /**
     * Construct object
     *
     * @param object $parentResource
     * @param string $uuid
     * @param string $name
     * @return SingleObject
     */
    public function __construct(object $parentResource, string $uuid, string $name)
    {
        parent::__construct($parentResource, $uuid, $name);
    }

    /**
     * Get parent object group
     * 
     * @return ObjectGroup
     */
    public function getParentObjectGroup(): ObjectGroup
    {
        if ($this->parentObjectGroup instanceof LazyLoadingProxy) {
            $this->parentObjectGroup->_loadRealInstance();
        }
        return $this->parentObjectGroup;
    }

    /**
     * Set parent object group
     * 
     * @param ObjectGroup
     */
    public function setParentObjectGroup(ObjectGroup $parentObjectGroup): void
    {
        $this->parentObjectGroup = $parentObjectGroup;
    }

    /**
     * Get parent single object
     * 
     * @return SingleObject
     */
    public function getParentSingleObject(): SingleObject
    {
        if ($this->parentSingleObject instanceof LazyLoadingProxy) {
            $this->parentSingleObject->_loadRealInstance();
        }
        return $this->parentSingleObject;
    }

    /**
     * Set parent single object
     * 
     * @param SingleObject
     */
    public function setParentSingleObject(SingleObject $parentSingleObject): void
    {
        $this->parentSingleObject = $parentSingleObject;
    }

    /**
     * Get media schema
     * 
     * @return FileReference
     */
    public function getMediaSchema(): FileReference
    {
        if ($this->mediaSchema instanceof LazyLoadingProxy) {
            $this->mediaSchema->_loadRealInstance();
        }
        return $this->mediaSchema;
    }

    /**
     * Set media schema
     * 
     * @param FileReference
     */
    public function setMediaSchema(FileReference $mediaSchema): void
    {
        $this->mediaSchema = $mediaSchema;
    }
}
