<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChildrenDetailsFixture
 */
class ChildrenDetailsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2022-08-05',
                'gender_id' => 1,
                'created' => '2022-08-05 21:23:49',
                'modified' => '2022-08-05 21:23:49',
            ],
        ];
        parent::init();
    }
}
