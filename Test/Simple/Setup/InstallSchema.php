<?php

namespace Test\Simple\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Test\Simple\Api\Data\OrderItemInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $tableName = $installer->getTable(OrderItemInterface::TABLE);
        $idField = OrderItemInterface::FIELD_ID;
        $orderIdField = OrderItemInterface::FIELD_ORDER_ID;
        $totalMultipliedField = OrderItemInterface::FIELD_TOTAL_MULTIPLIED;

        $table = $installer->getConnection()->newTable(
            $tableName
        )->addColumn(
            $idField,
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'auto_increment' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true
            ],
            'ID'
        )->addColumn(
            $orderIdField,
            Table::TYPE_INTEGER,
            null,
            [
                'unsigned' => true,
                'nullable' => false,
            ],
            'Order ID'
        )->addColumn(
            $totalMultipliedField,
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '12,4',
            [],
            'Order Paid Total Multiplied'
        )->setComment('Orders Multiplied Table');

        $installer->getConnection()->createTable($table);
    }
}