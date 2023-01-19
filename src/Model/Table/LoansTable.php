<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loans Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\Loan newEmptyEntity()
 * @method \App\Model\Entity\Loan newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Loan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loan findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Loan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loan[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoansTable extends Table
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

        $this->setTable('loans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('LoanTypes', [
            'foreignKey' => 'loan_type_id',
            'joinType' => 'INNER',
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
            ->integer('employee_id')
            ->requirePresence('employee_id', 'create')
            ->notEmptyString('employee_id');

        $validator
            ->decimal('principal')
            ->requirePresence('principal', 'create')
            ->notEmptyString('principal');

        $validator
            ->integer('tenor')
            ->requirePresence('tenor', 'create')
            ->notEmptyString('tenor');

        $validator
            ->integer('rate')
            ->notEmptyString('rate');

        $validator
            ->decimal('interest')
            ->requirePresence('interest', 'create')
            ->notEmptyString('interest');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->decimal('deduction')
            ->requirePresence('deduction', 'create')
            ->notEmptyString('deduction');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('remark')
            ->requirePresence('remark', 'create')
            ->notEmptyString('remark');

        $validator
            ->integer('status_id')
            ->requirePresence('status_id', 'create')
            ->notEmptyString('status_id');
        $validator
            ->integer('loan_type_id')
            ->requirePresence('loan_type_id', 'create')
            ->notEmptyString('loan_type_id');

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
        $rules->add($rules->existsIn('employee_id', 'Employees'), ['errorField' => 'employee_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('loan_type_id', 'LoanTypes'), ['errorField' => 'loan_type_id']);
        return $rules;
    }
}
