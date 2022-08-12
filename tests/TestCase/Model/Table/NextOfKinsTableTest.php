<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NextOfKinsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NextOfKinsTable Test Case
 */
class NextOfKinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NextOfKinsTable
     */
    protected $NextOfKins;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NextOfKins',
        'app.Employees',
        'app.Relationships',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NextOfKins') ? [] : ['className' => NextOfKinsTable::class];
        $this->NextOfKins = $this->getTableLocator()->get('NextOfKins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NextOfKins);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NextOfKinsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NextOfKinsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
