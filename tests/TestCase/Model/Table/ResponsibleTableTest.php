<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponsibleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponsibleTable Test Case
 */
class ResponsibleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponsibleTable
     */
    protected $Responsible;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Responsible',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Responsible') ? [] : ['className' => ResponsibleTable::class];
        $this->Responsible = $this->getTableLocator()->get('Responsible', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Responsible);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResponsibleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
