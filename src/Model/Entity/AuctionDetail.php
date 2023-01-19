<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuctionDetail Entity
 *
 * @property int $id
 * @property int $auction_id
 * @property int $asset_id
 * @property int $qty
 * @property int|null $approved_qty
 * @property int $price
 * @property string $total_payable
 * @property string|null $approved_payable
 * @property int $status_id
 * @property string|null $remark
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Auction $auction
 * @property \App\Model\Entity\Asset $asset
 * @property \App\Model\Entity\Status $status
 */
class AuctionDetail extends Entity
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
        'auction_id' => true,
        'asset_id' => true,
        'qty' => true,
        'approved_qty' => true,
        'price' => true,
        'total_payable' => true,
        'approved_payable' => true,
        'status_id' => true,
        'remark' => true,
        'created' => true,
        'modified' => true,
        'auction' => true,
        'asset' => true,
        'status' => true,
    ];
}
