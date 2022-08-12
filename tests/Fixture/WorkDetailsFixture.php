<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkDetailsFixture
 */
class WorkDetailsFixture extends TestFixture
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
                'organization' => 'Lorem ipsum dolor sit amet',
                'department' => 'Lorem ipsum dolor sit amet',
                'job_title' => 'Lorem ipsum dolor sit amet',
                'job_class' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2022-08-05',
                'end_date' => '2022-08-05',
                'created' => '2022-08-05 21:27:32',
                'modified' => '2022-08-05 21:27:32',
            ],
        ];
        parent::init();
    }
}
