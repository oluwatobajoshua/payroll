<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuctionDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuctionDetailsTable Test Case
 */
class AuctionDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuctionDetailsTable
     */
    protected $AuctionDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AuctionDetails',
        'app.Auctions',
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
        $config = $this->getTableLocator()->exists('AuctionDetails') ? [] : ['className' => AuctionDetailsTable::class];
        $this->AuctionDetails = $this->getTableLocator()->get('AuctionDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AuctionDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AuctionDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AuctionDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
