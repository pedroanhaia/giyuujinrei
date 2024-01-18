<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RelTeacherCoreFixture
 */
class RelTeacherCoreFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'rel_teacher_core';
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
                'idcore' => 1,
                'idteacher' => 1,
                'created' => '2024-01-17 19:55:11',
                'modified' => '2024-01-17 19:55:11',
                'role' => 1,
            ],
        ];
        parent::init();
    }
}
