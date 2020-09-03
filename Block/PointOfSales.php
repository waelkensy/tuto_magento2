<?php


namespace Wlks\Formation\Block;


use Magento\Framework\View\Element\Template;
use Wlks\Formation\Model\ResourceModel\PointOfSales\Collection;

class PointOfSales extends Template
{
    /**
     * @var Collection
     */
    private $pointOfSalesCollection;

    public function __construct(Template\Context $context, array $data = [], Collection $pointOfSalesCollection)
    {

        parent::__construct($context, $data);
        $this->pointOfSalesCollection = $pointOfSalesCollection;
    }

    /**
     * getPointOfSalesCollection
     *
     * @return Collection
     */
    public function getPointOfSalesCollection()
    {
        return $this->pointOfSalesCollection->load();
    }

}
