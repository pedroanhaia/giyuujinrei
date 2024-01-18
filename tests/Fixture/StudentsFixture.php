<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'urlpicture' => 'Lorem ipsum dolor sit amet',
                'idcore' => 1,
                'idresponsible' => 1,
                'phone' => 'Lorem ipsum dolor sit amet',
                'age' => 1,
                'class' => 'Lorem ip',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-17 19:51:46',
                'modified' => '2024-01-17 19:51:46',
                'role' => 1,
                'iduser' => 1,
                'idgrank' => 1,
            ],
        ];
        parent::init();
    }
}
