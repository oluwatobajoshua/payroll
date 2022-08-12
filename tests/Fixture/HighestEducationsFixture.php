<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HighestEducationsFixture
 */
class HighestEducationsFixture extends TestFixture
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
                'sort' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-05 20:32:53',
                'modified' => '2022-08-05 20:32:53',
            ],
        ];
        parent::init();
    }
}
