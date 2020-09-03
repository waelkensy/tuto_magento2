<?php

namespace Wlks\Formation\Controller\Adminhtml\PointOfSales;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\Manager;
use Wlks\Formation\Api\PointOfSalesRepositoryInterface;
use Wlks\Formation\Model\PointOfSalesFactory;
use Wlks\Formation\Model\PointOfSalesRepository;

/**
 * Class Save
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class Delete extends Action
{

    /**
     * @var PointOfSalesRepository
     */
    private $pointOfSalesRepository;
    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    public function __construct(
        Context $context,
        PointOfSalesRepository $pointOfSalesRepository,
        Manager $messageManager,
        RedirectFactory $redirectFactory
    ) {
        parent::__construct($context);
        $this->pointOfSalesRepository = $pointOfSalesRepository;
        $this->messageManager         = $messageManager;
        $this->redirectFactory        = $redirectFactory;
    }

    /**
     * execute
     *
     * @return ResponseInterface|ResultInterface|void
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $id     = isset($params['id']) ? $params['id'] : null;
        $this->pointOfSalesRepository->delete($id);
        $redirect = $this->redirectFactory->create();
        $redirect->setPath('pointofsales/pointofsales/manage');
        $this->messageManager->addSuccessMessage(__('Point of sales deleted'));

        return $redirect;
    }
}
