<?php

namespace Wlks\Formation\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Wlks\Formation\Api\Data\PointOfSalesInterface;
use Wlks\Formation\Model\ResourceModel\PointOfSales as resourceModel;

/**
 * Class PointOfSales
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class PointOfSales extends AbstractExtensibleModel implements PointOfSalesInterface
{
    const CACHE_TAG = 'wlks_pointofsales';
    protected $_cacheTag = 'wlks_pointofsales';
    protected $_eventPrefix = 'wlks_pointofsales';
    const NAME = 'name';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(resourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }
}
