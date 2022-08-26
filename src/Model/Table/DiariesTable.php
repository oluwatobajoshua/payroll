<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diaries Model
 *
 * @property \App\Model\Table\HallsTable&\Cake\ORM\Association\BelongsTo $Halls
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\Diary newEmptyEntity()
 * @method \App\Model\Entity\Diary newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diary findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diary[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diary|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diary saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DiariesTable extends Table
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

        $this->setTable('diaries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Halls', [
            'foreignKey' => 'hall_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 11)
            ->allowEmptyString('phone');

        $validator
            ->scalar('type_of_party')
            ->maxLength('type_of_party', 255)
            ->allowEmptyString('type_of_party');

        $validator
            ->scalar('covers')
            ->maxLength('covers', 255)
            ->requirePresence('covers', 'create')
            ->notEmptyString('covers');

        $validator
            ->scalar('drinks')
            ->maxLength('drinks', 255)
            ->requirePresence('drinks', 'create')
            ->notEmptyString('drinks');

        $validator
            ->integer('hall_id')
            ->requirePresence('hall_id', 'create')
            ->notEmptyString('hall_id');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

        $validator
            ->scalar('requirements')
            ->allowEmptyString('requirements');

        $validator
            ->numeric('total_bill')
            ->allowEmptyString('total_bill');

        $validator
            ->numeric('deposit')
            ->allowEmptyString('deposit');

        $validator
            ->numeric('balance')
            ->allowEmptyString('balance');

        $validator
            ->scalar('remarks')
            ->allowEmptyString('remarks');

        $validator
            ->integer('status_id')
            ->requirePresence('status_id', 'create')
            ->notEmptyString('status_id');

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
        $rules->add($rules->existsIn('hall_id', 'Halls'), ['errorField' => 'hall_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
