<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sections Model
 *
 * @property \App\Model\Table\UnitsTable&\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 * @property \App\Model\Table\OtherDepartmentsTable&\Cake\ORM\Association\HasMany $OtherDepartments
 *
 * @method \App\Model\Entity\Section newEmptyEntity()
 * @method \App\Model\Entity\Section newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Section[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Section get($primaryKey, $options = [])
 * @method \App\Model\Entity\Section findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Section patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Section[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Section|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Section saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SectionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sections');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'section_id',
        ]);
        $this->hasMany('OtherDepartments', [
            'foreignKey' => 'section_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('unit_id')
            ->requirePresence('unit_id', 'create')
            ->notEmptyString('unit_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('unit_id', 'Units'), ['errorField' => 'unit_id']);

        return $rules;
    }
}
