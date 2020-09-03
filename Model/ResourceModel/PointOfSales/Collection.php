<?php

namespace Wlks\Formation\Model\ResourceModel\PointOfSales;

use Wlks\Formation\Model\ResourceModel\PointOfSales as resourceModel;
use Wlks\Formation\Model\PointOfSales as model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'dnd_offer_offer_collection';
    protected $_eventObject = 'offer_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(model::class, resourceModel::class);
    }
}
