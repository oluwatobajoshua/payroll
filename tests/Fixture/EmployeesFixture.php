<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 */
class EmployeesFixture extends TestFixture
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
                'branch_id' => 1,
                'staff_no' => 1,
                'first_name' => 'Lorem ipsum dolor',
                'last_name' => 'Lorem ipsum ',
                'phone' => 'Lorem ips',
                'email' => 'Lorem ipsum dolor sit amet',
                'other_name' => 'Lorem ipsum dolor sit amet',
                'reporting_to' => 'Lorem ipsum dolor sit amet',
                'name_of_spouse' => 'Lorem ipsum dolor sit amet',
                'years_of_experience' => 1,
                'grade_id' => 1,
                'salary' => 1.5,
                'transport_allowance' => 1.5,
                'housing_allowance' => 1.5,
                'utility_allowance' => 1.5,
                'leave_allowance' => 1.5,
                'section_id' => 1,
                'cadre_id' => 1,
                'bank_id' => 1,
                'acct_no' => 'Lorem ip',
                'service_charge_bank' => 1,
                'service_charge_number' => 'Lorem ip',
                'gender_id' => 1,
                'religion_id' => 1,
                'local_id' => 1,
                'home_town' => 'Lorem ipsum dolor sit amet',
                'state_id' => 1,
                'physical_posture_id' => 1,
                'marital_status_id' => 1,
                'highest_education_id' => 1,
                'housing_upfront' => 'L',
                'designation_id' => 1,
                'status_id' => 1,
                'date_of_birth' => '2022-08-30',
                'date_joined' => '2022-08-30',
                'domestic_allowance' => 1.5,
                'tax_number' => 'Lorem ip',
                'tax_relief' => 'Lorem ip',
                'tax_paid_to_date' => 'Lorem ip',
                'pension_no' => 'Lorem ipsum d',
                'medical_allowance' => 1.5,
                'entertainment_allowance' => 1.5,
                'other_allowance' => 1.5,
                'personal_loan' => 1.5,
                'pers_loan_rep' => 1.5,
                'pers_loan_paid' => 1.5,
                'pers_loan_inst' => 1,
                'car_loan' => 1.5,
                'car_loan_rep' => 1.5,
                'car_loan_inst' => 1,
                'car_loan_paid' => 1.5,
                'whl_cics' => 1.5,
                'pension_control' => 'Lorem ip',
                'salary_advance' => 1.5,
                'salary_advance_rep' => 1.5,
                'salary_advance_paid' => 1.5,
                'salary_advance_inst' => 1.5,
                'drivers_allowance' => 1.5,
                'bro_cics' => 1.5,
                'user_id' => 1,
                'contribution' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2022-08-30 21:19:44',
                'modified' => '2022-08-30 21:19:44',
            ],
        ];
        parent::init();
    }
}
