<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CadresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CadresTable Test Case
 */
class CadresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CadresTable
     */
    protected $Cadres;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cadres',
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
        $config = $this->getTableLocator()->exists('Cadres') ? [] : ['className' => CadresTable::class];
        $this->Cadres = $this->getTableLocator()->get('Cadres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cadres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CadresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
