<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhysicalPosturesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhysicalPosturesTable Test Case
 */
class PhysicalPosturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhysicalPosturesTable
     */
    protected $PhysicalPostures;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PhysicalPostures',
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
        $config = $this->getTableLocator()->exists('PhysicalPostures') ? [] : ['className' => PhysicalPosturesTable::class];
        $this->PhysicalPostures = $this->getTableLocator()->get('PhysicalPostures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PhysicalPostures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PhysicalPosturesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
