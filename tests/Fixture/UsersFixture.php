<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 1,
                'created' => '2024-01-17 19:45:02',
                'modified' => '2024-01-17 19:45:02',
                'name' => 'Lorem ipsum dolor sit amet',
                'idcore' => 1,
            ],
        ];
        parent::init();
    }
}
