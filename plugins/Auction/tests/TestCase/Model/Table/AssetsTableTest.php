<?php
declare(strict_types=1);

namespace Auction\Test\TestCase\Model\Table;

use Auction\Model\Table\AssetsTable;
use Cake\TestSuite\TestCase;

/**
 * Auction\Model\Table\AssetsTable Test Case
 */
class AssetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Auction\Model\Table\AssetsTable
     */
    protected $Assets;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.Auction.Assets',
        'plugin.Auction.Locations',
        'plugin.Auction.Statuses',
        'plugin.Auction.AuctionDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Assets') ? [] : ['className' => AssetsTable::class];
        $this->Assets = $this->getTableLocator()->get('Assets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Assets);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Auction\Model\Table\AssetsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \Auction\Model\Table\AssetsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
