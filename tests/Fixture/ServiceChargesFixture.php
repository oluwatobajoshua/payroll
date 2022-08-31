<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServiceChargesFixture
 */
class ServiceChargesFixture extends TestFixture
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
                'grade_id' => 1,
                'amount' => 1,
                'ileya_xmas_bonus' => 1,
                'end_of_year_bonus' => 1,
                'njic_arrears' => 1,
                'company_id' => 1,
                'created' => '2022-08-30 12:18:28',
                'modified' => '2022-08-30 12:18:28',
            ],
        ];
        parent::init();
    }
}
