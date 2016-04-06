<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Prodotti\Service\ProdottiService;

class IndexController extends AbstractActionController
{

    private $prodottiService;

    public function __construct(ProdottiService $prodottiService) {
        $this->prodottiService = $prodottiService;
    }

    public function indexAction()
    {
        return new ViewModel([
            'prodottiEvidenza' => $this->prodottiService->getProdottiInEvidenza()
        ]);
    }
}
