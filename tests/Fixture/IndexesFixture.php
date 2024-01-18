<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IndexesFixture
 */
class IndexesFixture extends TestFixture
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
                'age_min' => 1,
                'age_max' => 1,
                'role' => 1,
                'idrating' => 1,
                'created' => '2024-01-17 19:47:00',
                'modified' => '2024-01-17 19:47:00',
            ],
        ];
        parent::init();
    }
}
