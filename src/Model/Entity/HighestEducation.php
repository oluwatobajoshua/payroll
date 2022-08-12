<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HighestEducation Entity
 *
 * @property int $id
 * @property int $sort
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Education[] $educations
 * @property \App\Model\Entity\Employee[] $employees
 */
class HighestEducation extends Entity
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
        'sort' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'educations' => true,
        'employees' => true,
    ];
}
