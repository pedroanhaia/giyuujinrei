<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResponsibleFixture
 */
class ResponsibleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'responsible';
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
                'socialfunction' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-17 19:54:20',
                'modified' => '2024-01-17 19:54:20',
                'role' => 1,
                'iduser' => 1,
            ],
        ];
        parent::init();
    }
}
