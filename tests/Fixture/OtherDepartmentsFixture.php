<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OtherDepartmentsFixture
 */
class OtherDepartmentsFixture extends TestFixture
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
                'section_id' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-05 21:25:51',
                'modified' => '2022-08-05 21:25:51',
            ],
        ];
        parent::init();
    }
}
