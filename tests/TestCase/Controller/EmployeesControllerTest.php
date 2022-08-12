<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\EmployeesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\EmployeesController Test Case
 *
 * @uses \App\Controller\EmployeesController
 */
class EmployeesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Employees',
        'app.Branches',
        'app.Grades',
        'app.Sections',
        'app.Cadres',
        'app.Banks',
        'app.Genders',
        'app.Religions',
        'app.Locals',
        'app.States',
        'app.PhysicalPostures',
        'app.MaritalStatuses',
        'app.HighestEducations',
        'app.Designations',
        'app.Statuses',
        'app.Users',
        'app.Addresses',
        'app.ChildrenDetails',
        'app.Companies',
        'app.Educations',
        'app.Leaves',
        'app.NextOfKins',
        'app.OtherDepartments',
        'app.Transactions',
        'app.WorkDetails',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\EmployeesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\EmployeesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\EmployeesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\EmployeesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\EmployeesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
