<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateStockLogs extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/5/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('stock_logs');
        $table
        ->addColumn('product_id', 'integer')
        ->addColumn('user_id', 'integer')
        ->addColumn('type', 'string', ['limit' => 20])
        ->addColumn('quantity', 'integer')
        ->addColumn('stock_before', 'integer')
        ->addColumn('stock_after', 'integer')
        ->addColumn('note', 'text', ['null' => true])
        ->addColumn('created', 'datetime')
        ->addIndex(['product_id'])
        ->addIndex(['user_id'])
        ->addForeignKey('product_id', 'products', 'id')
        ->addForeignKey('user_id', 'users', 'id')
        ->create();
    }
}
