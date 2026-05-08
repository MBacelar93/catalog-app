<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateProducts extends BaseMigration
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
        $table = $this->table('products');
        $table
            ->addColumn('category_id', 'integer', ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('slug', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
            ->addColumn('stock_quantity', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('min_stock', 'integer', ['default' => 5, 'null' => false])
            ->addColumn('is_active', 'boolean', ['default' => true, 'null' => false])
            ->addColumn('created', 'datetime', ['null' => false])
            ->addColumn('modified', 'datetime', ['null' => false])
            ->addIndex(['slug'], ['unique' => true])
            ->addIndex(['category_id'])
            ->addIndex(['user_id'])
            ->addForeignKey('category_id', 'categories', 'id')
            ->addForeignKey('user_id', 'users', 'id')
            ->create();
    }
}
