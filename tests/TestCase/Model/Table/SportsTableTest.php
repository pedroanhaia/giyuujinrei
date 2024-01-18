<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SportsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SportsTable Test Case
 */
class SportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SportsTable
     */
    protected $Sports;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Sports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sports') ? [] : ['className' => SportsTable::class];
        $this->Sports = $this->getTableLocator()->get('Sports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sports);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SportsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
