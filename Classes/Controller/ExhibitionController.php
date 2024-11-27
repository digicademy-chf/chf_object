<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Controller;

use Digicademy\CHFBase\Domain\Repository\AbstractResourceRepository;
use Digicademy\CHFObject\Domain\Model\ObjectGroup;
use Digicademy\CHFObject\Domain\Model\SingleObject;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Cache\CacheTag;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

defined('TYPO3') or die();

/**
 * Controller for Exhibition
 */
class ExhibitionController extends ActionController
{
    private AbstractResourceRepository $abstractResourceRepository;

    public function injectAbstractResourceRepository(AbstractResourceRepository $abstractResourceRepository): void
    {
        $this->abstractResourceRepository = $abstractResourceRepository;
    }

    /**
     * Show single object and oject group list
     *
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        // Get resource
        $resourceIdentifier = $this->settings['resource'];
        $this->view->assign('resource', $this->abstractResourceRepository->findByIdentifier($resourceIdentifier));

        // Set cache tag
        $this->request->getAttribute('frontend.cache.collector')->addCacheTags(
            new CacheTag('chf')
        );

        // Create response
        return $this->htmlResponse();
    }

    /**
     * Show single object
     *
     * @param SingleObject $singleObject
     * @return ResponseInterface
     */
    public function showSingleAction(SingleObject $singleObject): ResponseInterface
    {
        // Get single object
        $this->view->assign('singleObject', $singleObject);

        // Set cache tag
        $this->request->getAttribute('frontend.cache.collector')->addCacheTags(
            new CacheTag('chf')
        );

        // Create response
        return $this->htmlResponse();
    }

    /**
     * Show single object group
     *
     * @param ObjectGroup $objectGroup
     * @return ResponseInterface
     */
    public function showGroupAction(ObjectGroup $objectGroup): ResponseInterface
    {
        // Get object group
        $this->view->assign('objectGroup', $objectGroup);

        // Set cache tag
        $this->request->getAttribute('frontend.cache.collector')->addCacheTags(
            new CacheTag('chf')
        );

        // Create response
        return $this->htmlResponse();
    }
}
