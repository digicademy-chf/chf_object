<?php
defined('TYPO3') or die();
declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Controller;

use Psr\Http\Message\ResponseInterface;
use Digicademy\CHFObject\Domain\Model\ObjectGroup;
use Digicademy\CHFObject\Domain\Repository\ObjectGroupRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for ObjectGroup
 */
class ObjectGroupController extends ActionController
{
    private ObjectGroupRepository $objectGroupRepository;

    public function injectObjectGroupRepository(ObjectGroupRepository $objectGroupRepository): void
    {
        $this->objectGroupRepository = $objectGroupRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('objectGroups', $this->objectGroupRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(ObjectGroup $objectGroup): ResponseInterface
    {
        $this->view->assign('objectGroup', $objectGroup);
        return $this->htmlResponse();
    }
}
