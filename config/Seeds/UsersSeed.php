<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
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
                'name'       => 'Administrador',
                'email'      => 'admin@catalog.com',
                'password'   => password_hash('admin123', PASSWORD_BCRYPT),
                'role'       => 'admin',
                'is_active'  => 1,
                'created'    => date('Y-m-d H:i:s'),
                'modified'   => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'João Silva',
                'email'      => 'joao@catalog.com',
                'password'   => password_hash('user123', PASSWORD_BCRYPT),
                'role'       => 'user',
                'is_active'  => 1,
                'created'    => date('Y-m-d H:i:s'),
                'modified'   => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
