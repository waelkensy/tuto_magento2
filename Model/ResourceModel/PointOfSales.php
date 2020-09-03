<?php


namespace Wlks\Formation\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class PointOfSales
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class PointOfSales extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('point_of_sales', 'id');
    }
}
