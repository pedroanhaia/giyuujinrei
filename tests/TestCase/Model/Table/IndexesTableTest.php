<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndexesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndexesTable Test Case
 */
class IndexesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndexesTable
     */
    protected $Indexes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Indexes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Indexes') ? [] : ['className' => IndexesTable::class];
        $this->Indexes = $this->getTableLocator()->get('Indexes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Indexes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\IndexesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
