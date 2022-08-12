<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GradesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GradesTable Test Case
 */
class GradesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GradesTable
     */
    protected $Grades;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Grades',
        'app.Users',
        'app.Employees',
        'app.ServiceCharges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Grades') ? [] : ['className' => GradesTable::class];
        $this->Grades = $this->getTableLocator()->get('Grades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Grades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GradesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GradesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
