<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateProductsTags extends BaseMigration
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
        $table = $this->table('products_tags', ['id' => false, 'primary_key' => ['product_id', 'tag_id']]);
        $table
        ->addColumn('product_id', 'integer')
        ->addColumn('tag_id', 'integer')
        ->addIndex(['product_id'])
        ->addIndex(['tag_id'])
        ->addForeignKey('product_id', 'products', 'id')
        ->addForeignKey('tag_id', 'tags', 'id')
        ->create();
    }
}
