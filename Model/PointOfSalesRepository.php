<?php


namespace Wlks\Formation\Model;


use Exception;
use Magento\Framework\Exception\NoSuchEntityException;
use Wlks\Formation\Api\PointOfSalesRepositoryInterface;
use Wlks\Formation\Api\Data\PointOfSalesInterface;

/**
 * Class PointOfSalesRepository
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class PointOfSalesRepository implements PointOfSalesRepositoryInterface
{
    /**
     * @var PointOfSalesFactory
     */
    private $pointOfSalesFactory;
    /**
     * @var ResourceModel\PointOfSales
     */
    private $resourceModel;

    public function __construct(PointOfSalesFactory $pointOfSalesFactory, ResourceModel\PointOfSales $resourceModel)
    {
        $this->pointOfSalesFactory = $pointOfSalesFactory;
        $this->resourceModel       = $resourceModel;
    }

    /**
     * getById
     *
     * @param int $id
     *
     * @return PointOfSales
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $pointOfSales = $this->pointOfSalesFactory->create();
        $this->resourceModel->load($pointOfSales, $id);
        if (!$pointOfSales->getId()) {
            throw new NoSuchEntityException(__('Unable to find pointOfSales with ID "%1"', $id));
        }

        return $pointOfSales;
    }


    /**
     * delete
     *
     * @param int $id
     *
     * @return void|PointOfSales
     * @throws NoSuchEntityException
     * @throws Exception
     */
    public function delete($id)
    {
        $pointOfSales = $this->pointOfSalesFactory->create();
        $this->resourceModel->load($pointOfSales, $id);

        if (!$pointOfSales->getId()) {
            throw new NoSuchEntityException(__('Unable to find pointOfSales with ID "%1"', $id));
        }

        $this->resourceModel->delete($pointOfSales);
    }

    /**
     * save
     *
     * @param PointOfSalesInterface $pointOfSales
     *
     * @return void|PointOfSalesInterface
     */
    public function save($pointOfSales)
    {
        $pointOfSales->getResource()->save($pointOfSales);
    }
}
