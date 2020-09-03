<?php


namespace Wlks\Formation\Api;

use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface PointOfSalesRepositoryInterface extends ExtensibleDataInterface
{
    /**
     * @param int $id
     *
     * @return \Wlks\Formation\Api\Data\PointOfSalesInterface
     * @throws NoSuchEntityException
     */
    public function getById($id);

    /**
     * save
     *
     * @param \Wlks\Formation\Api\Data\PointOfSalesInterface $pointOfSales
     *
     * @return \Wlks\Formation\Api\Data\PointOfSalesInterface
     */
    public function save(\Wlks\Formation\Api\Data\PointOfSalesInterface $pointOfSales);

    /**
     * delete
     *
     * @param int $id
     *
     * @return void
     */
    public function delete($id);
}
