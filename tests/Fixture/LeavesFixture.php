<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LeavesFixture
 */
class LeavesFixture extends TestFixture
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
                'days_entitled' => 1,
                'previous_outstanding' => 1,
                'days_requested' => 1,
                'outstanding_days' => 1,
                'commencement_date' => '2022-08-05',
                'staff_signature' => 1,
                'relieving_officer' => 1,
                'hou_comments' => 1,
                'hod_comments' => 1,
                'hrm_comments' => 1,
                'md_comments' => 1,
                'status_id' => 1,
                'created' => '2022-08-05 21:24:57',
                'modified' => '2022-08-05 21:24:57',
            ],
        ];
        parent::init();
    }
}
