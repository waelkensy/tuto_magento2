<?php

namespace Wlks\Formation\Model\PointOfSales;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Wlks\Formation\Model\ResourceModel\PointOfSales\CollectionFactory;

/**
 * Class DataProvider
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var CollectionFactory
     */
    private $pointOfSalesCollection;

    /**
     * DataProvider constructor.
     *
     * @param string            $name
     * @param string            $primaryFieldName
     * @param string            $requestFieldName
     * @param array             $meta
     * @param array             $data
     * @param CollectionFactory $pointOfSalesCollectionFactory
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [],
        CollectionFactory $pointOfSalesCollectionFactory
    ) {
        $this->collection = $pointOfSalesCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * getData
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items            = $this->collection->getItems();
        $this->loadedData = array();

        foreach ($items as $pointOfSales) {
            $this->loadedData[$pointOfSales->getId()]['point_of_sales'] = $pointOfSales->getData();
        }

        return $this->loadedData;
    }
}
