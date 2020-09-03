<?php


namespace Wlks\Formation\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Wlks\Formation\Model\PointOfSales;

class Data extends AbstractHelper
{

    /**
     * @var PointOfSales
     */
    private $pointOfSales;
    /**
     * @var \Wlks\Formation\Model\ResourceModel\PointOfSales
     */
    private $pointOfSalesResourceModel;

    public function __construct(Context $context, PointOfSales $pointOfSales, \Wlks\Formation\Model\ResourceModel\PointOfSales $pointOfSalesResourceModel)
    {
        parent::__construct($context);
        $this->pointOfSales = $pointOfSales;
        $this->pointOfSalesResourceModel = $pointOfSalesResourceModel;
    }

    public function testHelper()
    {
       $pointOfSales = $this->pointOfSalesResourceModel->load(2);
    }

}
