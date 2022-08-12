<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherDepartmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherDepartmentsTable Test Case
 */
class OtherDepartmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OtherDepartmentsTable
     */
    protected $OtherDepartments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.OtherDepartments',
        'app.Employees',
        'app.Sections',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OtherDepartments') ? [] : ['className' => OtherDepartmentsTable::class];
        $this->OtherDepartments = $this->getTableLocator()->get('OtherDepartments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OtherDepartments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OtherDepartmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OtherDepartmentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
