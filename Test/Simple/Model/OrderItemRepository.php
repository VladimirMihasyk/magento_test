<?php

namespace Test\Simple\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Test\Simple\Api\OrderItemRepositoryInterface;
use Test\Simple\Api\Data\OrderItemInterface;
use Test\Simple\Model\ResourceModel\OrderItem as OrderItemResource;
use Test\Simple\Api\Data\OrderItemInterfaceFactory as OrderItemFactory;
use Test\Simple\Model\ResourceModel\OrderItem\CollectionFactory;



class OrderItemRepository implements OrderItemRepositoryInterface {
    private $orderItemResource;
    private $collectionFactory;
    private $orderItemFactory;

    public function __construct(OrderItemResource $orderItemResource, CollectionFactory $collectionFactory, OrderItemFactory $orderItemFactory) {
        $this->orderItemResource = $orderItemResource;
        $this->collectionFactory = $collectionFactory;
        $this->orderItemFactory = $orderItemFactory;
    }

    /**
     * @inheritdoc
     */
    public function save(OrderItemInterface $orderItem)
    {
        try {
            $this->orderItemResource->save($orderItem);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('Can\'t save multiplied order: %1', $e->getMessage())
            );
        }

        return $orderItem;
    }

    /**
     * @inheritdoc
     */
    public function getEmptyInstance()
    {
        return $this->orderItemFactory->create();
    }
    
}