<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReligionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReligionsTable Test Case
 */
class ReligionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReligionsTable
     */
    protected $Religions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Religions',
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
        $config = $this->getTableLocator()->exists('Religions') ? [] : ['className' => ReligionsTable::class];
        $this->Religions = $this->getTableLocator()->get('Religions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Religions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReligionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
