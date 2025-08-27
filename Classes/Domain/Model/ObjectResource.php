<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Domain\Model;

use Digicademy\CHFBase\Domain\Model\AbstractResource;
use Digicademy\CHFGloss\Domain\Model\Traits\GlossaryTrait;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

/**
 * Model for AbstractObjectResource
 */
class AbstractObjectResource extends AbstractResource
{
    /**
     * Construct object
     *
     * @param string $langCode
     * @return ObjectResource
     */
    public function __construct(string $langCode)
    {
        parent::__construct($langCode);

        $this->setType('objectResource');
    }
}

# If CHF Gloss is available
if (ExtensionManagementUtility::isLoaded('chf_gloss')) {

    /**
     * Model for ObjectResource (with glossary property)
     */
    class ObjectResource extends AbstractObjectResource
    {
        use GlossaryTrait;
    }

# If no relevant extensions are available
} else {

    /**
     * Model for ObjectResource
     */
    class ObjectResource extends AbstractObjectResource
    {}
}
