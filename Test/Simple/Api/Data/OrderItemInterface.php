<?php

namespace Test\Simple\Api\Data;

/**
 * Interface order multiplied.
 */
interface OrderItemInterface
{
    /**
     * Table name.
     */
    const TABLE = 'test_simple_order_multiplied';

    /**
     * Constants for field names.
     */
    const FIELD_ID = 'id';
    const FIELD_ORDER_ID = 'order_id';
    const FIELD_TOTAL_MULTIPLIED = 'total_multiplied';

    /**
     * Get id.
     *
     * @return integer|null
     */
    public function getId();

    /**
     * Set id.
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get order id.
     *
     * @return integer
     */
    public function getOrderId();

    /**
     * Set order id.
     *
     * @param integer $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * Get Total Multiplied value.
     *
     * @return string|null
     */
    public function getOrderTotalMultiplied();

    /**
     * Set Total Multiplied value.
     *
     * @param string $value
     * @return $this
     */
    public function setOrderTotalMultiplied($value);
}