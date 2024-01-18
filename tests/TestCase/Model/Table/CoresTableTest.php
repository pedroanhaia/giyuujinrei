<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoresTable Test Case
 */
class CoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoresTable
     */
    protected $Cores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cores') ? [] : ['className' => CoresTable::class];
        $this->Cores = $this->getTableLocator()->get('Cores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
