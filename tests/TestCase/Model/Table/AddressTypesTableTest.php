<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressTypesTable Test Case
 */
class AddressTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressTypesTable
     */
    protected $AddressTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AddressTypes',
        'app.Addresses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AddressTypes') ? [] : ['className' => AddressTypesTable::class];
        $this->AddressTypes = $this->getTableLocator()->get('AddressTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AddressTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AddressTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
