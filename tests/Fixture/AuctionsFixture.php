<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuctionsFixture
 */
class AuctionsFixture extends TestFixture
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
                'user_id' => 1,
                'asset_qty' => 1,
                'amount' => 1.5,
                'approved_amount' => 1.5,
                'status_id' => 1,
                'created' => '2023-01-18 22:21:20',
                'modified' => '2023-01-18 22:21:20',
            ],
        ];
        parent::init();
    }
}
