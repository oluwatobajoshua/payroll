<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BiddingDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BiddingDetailsTable Test Case
 */
class BiddingDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BiddingDetailsTable
     */
    protected $BiddingDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BiddingDetails',
        'app.Biddings',
        'app.Assets',
        'app.Statuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BiddingDetails') ? [] : ['className' => BiddingDetailsTable::class];
        $this->BiddingDetails = $this->getTableLocator()->get('BiddingDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BiddingDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BiddingDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BiddingDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
