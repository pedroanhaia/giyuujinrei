<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelTeacherCoreTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelTeacherCoreTable Test Case
 */
class RelTeacherCoreTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelTeacherCoreTable
     */
    protected $RelTeacherCore;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.RelTeacherCore',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RelTeacherCore') ? [] : ['className' => RelTeacherCoreTable::class];
        $this->RelTeacherCore = $this->getTableLocator()->get('RelTeacherCore', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RelTeacherCore);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RelTeacherCoreTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
