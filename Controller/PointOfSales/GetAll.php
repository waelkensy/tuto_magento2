<?php

namespace Wlks\Formation\Controller\PointOfSales;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Wlks\Formation\Model\ResourceModel\PointOfSales\Collection;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class GetAll
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class GetAll implements ActionInterface
{
    /**
     * @var Collection
     */
    protected $pointOfSales;

    /** @var PageFactory */
    protected $resultPageFactory;

    public function __construct(
        Collection $pointOfSalesCollection,
        PageFactory $resultPageFactory
    ) {
        $this->pointOfSales      = $pointOfSalesCollection;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * execute
     *
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }

}
