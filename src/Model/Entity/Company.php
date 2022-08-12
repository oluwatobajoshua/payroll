<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $rc
 * @property string $address
 * @property float $union_due
 * @property float $company_leave
 * @property \Cake\I18n\FrozenDate $date
 * @property int $employee_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Branch[] $branches
 * @property \App\Model\Entity\ServiceCharge[] $service_charges
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Company extends Entity
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
        'rc' => true,
        'address' => true,
        'union_due' => true,
        'company_leave' => true,
        'date' => true,
        'employee_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'branches' => true,
        'service_charges' => true,
        'transactions' => true,
    ];
}
