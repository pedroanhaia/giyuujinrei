<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoresFixture
 */
class CoresFixture extends TestFixture
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
                'city' => 'Lorem ipsum dolor sit amet',
                'count_students' => 1,
                'type' => 1,
                'contact' => 'Lorem ipsum dolor sit amet',
                'positioncontact' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-17 19:46:39',
                'modified' => '2024-01-17 19:46:39',
                'role' => 1,
            ],
        ];
        parent::init();
    }
}
