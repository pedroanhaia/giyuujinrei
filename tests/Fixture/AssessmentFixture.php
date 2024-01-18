<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssessmentFixture
 */
class AssessmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'assessment';
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
                'idindex' => 1,
                'idteacher' => 1,
                'idstudent' => 1,
                'value' => 1,
                'idschedule' => 1,
                'created' => '2024-01-17 20:00:37',
                'modified' => '2024-01-17 20:00:37',
                'role' => 1,
            ],
        ];
        parent::init();
    }
}
