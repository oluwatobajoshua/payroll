<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssetsFixture
 */
class AssetsFixture extends TestFixture
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
                'code' => 'Lorem ipsum dolor sit amet',
                'item' => 'Lorem ipsum dolor sit amet',
                'model' => 'Lorem ipsum dolor sit amet',
                'date_of_purchase' => 'Lorem ipsum dolor sit amet',
                'qty_available' => 1,
                'qty_bidded' => 1,
                'qty_left' => 1,
                'reserved_price' => 1.5,
                'location_id' => 1,
                'status_id' => 1,
            ],
        ];
        parent::init();
    }
}
