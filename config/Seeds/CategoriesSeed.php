<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends BaseSeed
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
    public function run(): void
    {
 $data = [
            [
                'name'        => 'Eletrônicos',
                'slug'        => 'eletronicos',
                'description' => 'Notebooks, smartphones, tablets e acessórios',
                'is_active'   => 1,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Periféricos',
                'slug'        => 'perifericos',
                'description' => 'Mouses, teclados, monitores e headsets',
                'is_active'   => 1,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Acessórios',
                'slug'        => 'acessorios',
                'description' => 'Cabos, adaptadores e cases',
                'is_active'   => 1,
                'created'     => date('Y-m-d H:i:s'),
                'modified'    => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
