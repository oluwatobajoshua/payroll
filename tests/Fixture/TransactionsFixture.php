<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
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
                'employee_id' => 1,
                'company_id' => 1,
                'date' => '2022-08-05',
                'basic_salary' => 1,
                'domestic_allowance' => 1,
                'housing_allowance' => 1,
                'transport_allowance' => 1,
                'utility_allowance' => 1,
                'living_in_allowance' => 1,
                'medical_allowance' => 1,
                'entertainment_allowance' => 1,
                'leave_allowance' => 1,
                'other_allowance' => 1,
                'gross' => 1,
                'paye' => 1,
                'whl_cics' => 1,
                'pension_deduction' => 1,
                'other_deduction' => 1,
                'total_deduction' => 1,
                'net_pay' => 1,
                'salary_advance' => 1,
                'drivers_allowance' => 1,
                'bar_account' => 1,
                'union_due' => 1,
                'tax_amount' => 1,
                'arrears' => 1,
                'sc_deduction' => 1,
                'ileya_xmas_bonus' => 1,
                'end_of_year_bonus' => 1,
                'service_charge' => 1,
                'personal_loan' => 1,
                'ctcs' => 1,
                'bro_cics' => 1,
                'surcharge' => 1,
            ],
        ];
        parent::init();
    }
}
