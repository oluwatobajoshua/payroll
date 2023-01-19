<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $principal
 * @property int $tenor
 * @property int $rate
 * @property string $interest
 * @property string $total
 * @property string $deduction
 * @property \Cake\I18n\FrozenDate $date
 * @property string $remark
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Status $status
 */
class Loan extends Entity
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
        'employee_id' => true,
        'principal' => true,
        'tenor' => true,
        'rate' => true,
        'interest' => true,
        'total' => true,
        'deduction' => true,
        'date' => true,
        'remark' => true,
        'status_id' => true,
        'loan_type_id' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'status' => true,
        'loan_type' => true
    ];
}
