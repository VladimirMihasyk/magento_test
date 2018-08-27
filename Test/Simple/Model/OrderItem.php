<?php
namespace Test\Simple\Model;

use Magento\Framework\Model\AbstractModel;
use Test\Simple\Api\Data\OrderItemInterface;
use Test\Simple\Model\ResourceModel\OrderItem as OrderItemResource;

class OrderItem 
    extends AbstractModel
    implements OrderItemInterface {
    
    protected function _construct(){
        $this->_init(OrderItemResource::class);
    }
    
    /**
     * @inheritdoc
     */
    public function getId(){
        return $this->_getData(self::FIELD_ID);
    }

    /**
     * @inheritdoc
     */
    public function setId($id) {
        return $this->setData(self::FIELD_ID, $id);
    }

    /**
     * @inheritdoc
     */
    public function getOrderId(){
        return $this->_getData(self::FIELD_ORDER_ID);
    }

    /**
     * @inheritdoc
     */
    public function setOrderId($orderId) {
        return $this->setData(self::FIELD_ORDER_ID, $orderId);
    }

    /**
     * @inheritdoc
     */
    public function getOrderTotalMultiplied(){
        return $this->_getData(self::FIELD_TOTAL_MULTIPLIED);
    }

    /**
     * @inheritdoc
     */
    public function setOrderTotalMultiplied($value) {
        return $this->setData(self::FIELD_TOTAL_MULTIPLIED, $value);
    }
}
