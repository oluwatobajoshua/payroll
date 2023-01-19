<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuctionDetailsFixture
 */
class AuctionDetailsFixture extends TestFixture
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
                'auction_id' => 1,
                'asset_id' => 1,
                'qty' => 1,
                'approved_qty' => 1,
                'price' => 1,
                'total_payable' => 1.5,
                'approved_payable' => 1.5,
                'status_id' => 1,
                'remark' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-18 22:00:01',
                'modified' => '2023-01-18 22:00:01',
            ],
        ];
        parent::init();
    }
}
