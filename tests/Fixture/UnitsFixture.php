<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitsFixture
 */
class UnitsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'created' => '2022-08-11 14:11:49',
                'modified' => '2022-08-11 14:11:49',
            ],
        ];
        parent::init();
    }
}
