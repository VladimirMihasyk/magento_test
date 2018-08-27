<?php

namespace Test\Simple\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Test\Simple\Api\Data\OrderItemInterface;

class OrderItem extends AbstractDb {

    protected function _construct(){
        $this->_init(OrderItemInterface::TABLE,OrderItemInterface::FIELD_ID);
    }

}