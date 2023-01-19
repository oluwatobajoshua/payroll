<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asset Entity
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $item
 * @property string|null $model
 * @property string|null $date_of_purchase
 * @property int|null $qty_available
 * @property int $qty_bidded
 * @property int $qty_left
 * @property string|null $reserved_price
 * @property int|null $location_id
 * @property int|null $status_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\AuctionDetail[] $auction_details
 */
class Asset extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'code' => true,
        'item' => true,
        'model' => true,
        'date_of_purchase' => true,
        'qty_available' => true,
        'qty_bidded' => true,
        'qty_left' => true,
        'reserved_price' => true,
        'location_id' => true,
        'status_id' => true,
        'location' => true,
        'status' => true,
        'auction_details' => true,
    ];
}
