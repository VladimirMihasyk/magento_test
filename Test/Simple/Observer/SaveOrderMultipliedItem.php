<?php

namespace Test\Simple\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Invoice;
use Test\Simple\Api\Data\OrderItemInterface;
use Test\Simple\Api\OrderItemRepositoryInterface;
use Test\Simple\Model\Config;

/**
 * Observer save order data after invoice pay.
 */
class SaveOrderMultipliedItem implements ObserverInterface
{
    /**
     * Model repository.
     *
     * @var OrderItemRepositoryInterface
     */
    private $orderItemRepository;

    /**
     * Configuration.
     *
     * @var Config
     */
    private $config;

    /**
     * @param OrderItemRepositoryInterface $orderItemRepository
     * @param Config $config
     */
    public function __construct(OrderItemRepositoryInterface $orderItemRepository, Config $config) {
        $this->orderItemRepository = $orderItemRepository;
        $this->config = $config;
    }

    /**
     * Save order multiplied data.
     *
     * @param Observer $observer
     * @return $this
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        if (!$this->config->isEnabled()) {
            return $this;
        }
        /** @var Invoice $invoice */
        $invoice = $observer->getInvoice();

        $deсimalFactor = $this->config->getDecimalFactor();

        /** @var Order $order */
        $order = $invoice->getOrder();
        $orderId = $order->getId();

        if ($orderId) {

            $orderSum = $order->getBaseTotalPaid();
            $value = bcmul($orderSum, $deсimalFactor, 2);
            /** @var OrderItemInterface $model */
            $model = $this->orderItemRepository->getEmptyInstance();

            $model->setOrderId($orderId)
                ->setOrderTotalMultiplied($value);


            try {
                $this->orderItemRepository->save($model);
            } catch (CouldNotSaveException $e) {
                throw new \Exception($e);
            }
        }

        return $this;
    }
}