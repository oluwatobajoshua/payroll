<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HighestEducationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HighestEducationsTable Test Case
 */
class HighestEducationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HighestEducationsTable
     */
    protected $HighestEducations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.HighestEducations',
        'app.Educations',
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
        $config = $this->getTableLocator()->exists('HighestEducations') ? [] : ['className' => HighestEducationsTable::class];
        $this->HighestEducations = $this->getTableLocator()->get('HighestEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HighestEducations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HighestEducationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
