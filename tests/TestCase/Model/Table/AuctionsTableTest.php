<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuctionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuctionsTable Test Case
 */
class AuctionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuctionsTable
     */
    protected $Auctions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Auctions',
        'app.Users',
        'app.Statuses',
        'app.AuctionDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Auctions') ? [] : ['className' => AuctionsTable::class];
        $this->Auctions = $this->getTableLocator()->get('Auctions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Auctions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AuctionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AuctionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
