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

/**
 * Class Save
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class Save extends Action
{
    /**
     * @var PointOfSalesRepositoryInterface
     */
    private $pointOfSalesRepository;

    /**
     * @var PointOfSalesFactory
     */
    private $pointOfSalesFactory;
    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    public function __construct(
        Context $context,
        PointOfSalesRepositoryInterface $pointOfSalesRepository,
        PointOfSalesFactory $pointOfSalesFactory,
        RedirectFactory $redirectFactory,
        Manager $messageManager
    ) {
        parent::__construct($context);

        $this->pointOfSalesRepository = $pointOfSalesRepository;
        $this->pointOfSalesFactory    = $pointOfSalesFactory;
        $this->redirectFactory        = $redirectFactory;
        $this->messageManager         = $messageManager;
    }

    /**
     * execute
     *
     * @return ResponseInterface|ResultInterface|void
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $redirect = $this->redirectFactory->create();
        $postData = $this->getRequest()->getParam('point_of_sales');
        $id       = isset($postData['id']) ? $postData['id'] : null;

        if (null != $id) {
            $pointOfSales = $this->pointOfSalesRepository->getById($id);
            $message      = (__('Le point de vente est modifié'));
        } else {
            $pointOfSales = $this->pointOfSalesFactory->create();
            $message      = (__('Le point de vente est créé'));
        }

        try {
            $pointOfSales->setName($postData["name"]);
            $this->pointOfSalesRepository->save($pointOfSales);
            $redirect->setPath('*/*/edit', ['id' => $pointOfSales->getId()]);

        } catch (\Exception $exception) {
            $redirect->setPath('*/*/manage');
            $this->messageManager->addExceptionMessage($exception, __('Error'));

            return $redirect;
        }

        $this->messageManager->addSuccessMessage($message);

        return $redirect;
    }
}
