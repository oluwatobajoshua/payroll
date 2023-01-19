<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoanTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoanTypesTable Test Case
 */
class LoanTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LoanTypesTable
     */
    protected $LoanTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LoanTypes',
        'app.Loans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LoanTypes') ? [] : ['className' => LoanTypesTable::class];
        $this->LoanTypes = $this->getTableLocator()->get('LoanTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LoanTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LoanTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
