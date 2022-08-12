<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaritalStatusesFixture
 */
class MaritalStatusesFixture extends TestFixture
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
                'created' => '2022-08-05 20:32:33',
                'modified' => '2022-08-05 20:32:33',
            ],
        ];
        parent::init();
    }
}
