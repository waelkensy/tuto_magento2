<?php

namespace Wlks\Formation\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PointOfSalesInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name);
}
