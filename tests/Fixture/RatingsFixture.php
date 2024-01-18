<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RatingsFixture
 */
class RatingsFixture extends TestFixture
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
                'created' => '2024-01-17 19:56:07',
                'modified' => '2024-01-17 19:56:07',
                'role' => 1,
            ],
        ];
        parent::init();
    }
}
