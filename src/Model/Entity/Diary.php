<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diary Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $phone
 * @property string|null $type_of_party
 * @property string $covers
 * @property string $drinks
 * @property int $hall_id
 * @property \Cake\I18n\FrozenTime $date
 * @property string|null $requirements
 * @property float|null $total_bill
 * @property float|null $deposit
 * @property float|null $balance
 * @property string|null $remarks
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Hall $hall
 * @property \App\Model\Entity\Status $status
 */
class Diary extends Entity
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
        'name' => true,
        'address' => true,
        'phone' => true,
        'type_of_party' => true,
        'covers' => true,
        'drinks' => true,
        'hall_id' => true,
        'date' => true,
        'requirements' => true,
        'total_bill' => true,
        'deposit' => true,
        'balance' => true,
        'remarks' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'hall' => true,
        'status' => true,
    ];
}
