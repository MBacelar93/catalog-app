<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Products seed.
 */
class ProductsSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/5/en/seeding.html
     *
     * @return void
     */

    public function getDependencies(): array
    {
        return [
            'UsersSeed',
            'CategoriesSeed',
            'TagsSeed',
        ];
    }
    public function run(): void
    {
 $data = [
            [
                'category_id'    => 1,
                'user_id'        => 1,
                'name'           => 'Notebook Dell XPS 15',
                'slug'           => 'notebook-dell-xps-15',
                'description'    => 'Notebook premium com tela 4K e processador Intel i7',
                'price'          => '9999.90',
                'stock_quantity' => 10,
                'min_stock'      => 3,
                'is_active'      => 1,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'    => 1,
                'user_id'        => 1,
                'name'           => 'iPhone 15 Pro',
                'slug'           => 'iphone-15-pro',
                'description'    => 'Smartphone Apple com chip A17 Pro',
                'price'          => '7499.90',
                'stock_quantity' => 4,
                'min_stock'      => 5,
                'is_active'      => 1,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'    => 2,
                'user_id'        => 1,
                'name'           => 'Mouse Logitech MX Master 3',
                'slug'           => 'mouse-logitech-mx-master-3',
                'description'    => 'Mouse ergonômico sem fio com scroll adaptativo',
                'price'          => '599.90',
                'stock_quantity' => 0,
                'min_stock'      => 5,
                'is_active'      => 1,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'    => 2,
                'user_id'        => 2,
                'name'           => 'Teclado Mecânico Keychron K2',
                'slug'           => 'teclado-mecanico-keychron-k2',
                'description'    => 'Teclado mecânico compacto com switches Gateron',
                'price'          => '449.90',
                'stock_quantity' => 2,
                'min_stock'      => 5,
                'is_active'      => 1,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'    => 3,
                'user_id'        => 2,
                'name'           => 'Cabo USB-C 2m',
                'slug'           => 'cabo-usb-c-2m',
                'description'    => 'Cabo USB-C para USB-C com suporte a 100W',
                'price'          => '49.90',
                'stock_quantity' => 50,
                'min_stock'      => 10,
                'is_active'      => 1,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
