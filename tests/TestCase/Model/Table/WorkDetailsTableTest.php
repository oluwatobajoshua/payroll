<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkDetailsTable Test Case
 */
class WorkDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkDetailsTable
     */
    protected $WorkDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.WorkDetails',
        'app.Employees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WorkDetails') ? [] : ['className' => WorkDetailsTable::class];
        $this->WorkDetails = $this->getTableLocator()->get('WorkDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WorkDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WorkDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\WorkDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
