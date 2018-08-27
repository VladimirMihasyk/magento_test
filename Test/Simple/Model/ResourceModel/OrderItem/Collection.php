<?php

namespace Test\Simple\Model\ResourceModel\OrderItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Simple\Api\Data\OrderItemInterface;
use Test\Simple\Model\OrderItem;
use Test\Simple\Model\ResourceModel\OrderItem as OrderItemResource;

class Collection extends AbstractCollection {

    /**
     * @inheritdoc
     */
    protected $_idFieldName = OrderItemInterface::FIELD_ID;

    protected function _construct()
    {
        $this->_init(OrderItem::class, OrderItemResource::class);
    }
}