<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BiddingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BiddingsTable Test Case
 */
class BiddingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BiddingsTable
     */
    protected $Biddings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Biddings',
        'app.Users',
        'app.Statuses',
        'app.BiddingDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Biddings') ? [] : ['className' => BiddingsTable::class];
        $this->Biddings = $this->getTableLocator()->get('Biddings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Biddings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BiddingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BiddingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
