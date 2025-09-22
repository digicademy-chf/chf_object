<?php
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Controller;

use Digicademy\CHFBase\Domain\Model\Location;
use Digicademy\CHFBase\Domain\Repository\AbstractResourceRepository;
use Digicademy\CHFObject\Domain\Model\ObjectGroup;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

defined('TYPO3') or die();

/**
 * Controller for Spaces
 */
class SpacesController extends ActionController
{
    /**
     * Constructor takes care of dependency injection
     */
    public function __construct(
        protected readonly AbstractResourceRepository $abstractResourceRepository,
    ) {}

    /**
     * Show location list
     *
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        // Get resource
        $resourceIdentifier = $this->settings['resource'];
        $this->view->assign('resource', $this->abstractResourceRepository->findByIdentifier($resourceIdentifier));

        // Create response
        return $this->htmlResponse();
    }

    /**
     * Show single location
     *
     * @param Location $location
     * @return ResponseInterface
     */
    public function showAction(Location $location): ResponseInterface
    {
        // Get location
        $this->view->assign('location', $location);

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

        // Create response
        return $this->htmlResponse();
    }
}
