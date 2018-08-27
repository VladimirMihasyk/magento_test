<?php

namespace Test\Simple\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Test\Simple\Api\Data\OrderItemInterface;

/**
 * Interface paid order item.
 */
interface OrderItemRepositoryInterface
{
    /**
     * Saves fully paid order.
     *
     * @param OrderItemInterface $orderItemModel
     * @return OrderItemInterface
     * @throws CouldNotSaveException
     */
    public function save(OrderItemInterface $orderItemModel);

    /**
     * Return empty model instance.
     *
     * @return OrderItemInterface
     */
    public function getEmptyInstance();
}
