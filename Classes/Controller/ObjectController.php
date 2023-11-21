<?php

declare(strict_types=1);

# This file is part of the extension CHF Object for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFObject\Controller;

use Psr\Http\Message\ResponseInterface;
use Digicademy\CHFObject\Domain\Model\SingleObject;
use Digicademy\CHFObject\Domain\Repository\SingleObjectRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for SingleObject
 */
class SingleObjectController extends ActionController
{
    private SingleObjectRepository $singleObjectRepository;

    public function injectSingleObjectRepository(SingleObjectRepository $singleObjectRepository): void
    {
        $this->singleObjectRepository = $singleObjectRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('singleObjects', $this->singleObjectRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(SingleObject $singleObject): ResponseInterface
    {
        $this->view->assign('singleObject', $singleObject);
        return $this->htmlResponse();
    }
}

?>
