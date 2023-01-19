<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Auction Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $asset_qty
 * @property string $amount
 * @property string|null $approved_amount
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\AuctionDetail[] $auction_details
 */
class Auction extends Entity
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
        'user_id' => true,
        'asset_qty' => true,
        'amount' => true,
        'approved_amount' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'status' => true,
        'auction_details' => true,
    ];
}
