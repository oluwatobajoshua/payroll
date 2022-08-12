<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompaniesFixture
 */
class CompaniesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'rc' => 'Lorem ipsum dolor ',
                'address' => 'Lorem ipsum dolor sit amet',
                'union_due' => 1,
                'company_leave' => 1,
                'date' => '2022-08-11',
                'employee_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-11 14:11:00',
                'modified' => '2022-08-11 14:11:00',
            ],
        ];
        parent::init();
    }
}
