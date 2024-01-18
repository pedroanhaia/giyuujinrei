<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeachersFixture
 */
class TeachersFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'rg' => 'Lorem ipsum dolor sit amet',
                'type' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-17 19:50:28',
                'modified' => '2024-01-17 19:50:28',
                'role' => 1,
                'iduser' => 1,
            ],
        ];
        parent::init();
    }
}
