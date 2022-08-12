<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CadresFixture
 */
class CadresFixture extends TestFixture
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
                'tax_due' => 1,
                'union_due' => 1,
                'pension' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-11 14:12:23',
                'modified' => '2022-08-11 14:12:23',
            ],
        ];
        parent::init();
    }
}
