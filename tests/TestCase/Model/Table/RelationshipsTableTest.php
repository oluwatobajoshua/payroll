<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelationshipsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelationshipsTable Test Case
 */
class RelationshipsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RelationshipsTable
     */
    protected $Relationships;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Relationships',
        'app.NextOfKins',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Relationships') ? [] : ['className' => RelationshipsTable::class];
        $this->Relationships = $this->getTableLocator()->get('Relationships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Relationships);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RelationshipsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
