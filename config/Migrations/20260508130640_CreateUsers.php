<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
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
        $table = $this->table('users');

        $table
        ->addColumn('name', 'string', ['limit' => 100])
        ->addColumn('email', 'string',['limit' => 255])
        ->addColumn('password', 'string', ['limit' => 255])
        ->addColumn('role', 'string', ['limit'=> 20, 'default' => 'user'])
        ->addColumn('is_active', 'boolean', ['default' => true])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->addIndex(['email'], ['unique'=> true])
        ->create();
    }
}
