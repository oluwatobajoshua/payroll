<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BiddingDetails Model
 *
 * @property \App\Model\Table\BiddingsTable&\Cake\ORM\Association\BelongsTo $Biddings
 * @property \App\Model\Table\AssetsTable&\Cake\ORM\Association\BelongsTo $Assets
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\BiddingDetail newEmptyEntity()
 * @method \App\Model\Entity\BiddingDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BiddingDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BiddingDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\BiddingDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BiddingDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BiddingDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BiddingDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BiddingDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BiddingDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BiddingDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BiddingDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BiddingDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BiddingDetailsTable extends Table
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

        $this->setTable('bidding_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Biddings', [
            'foreignKey' => 'bidding_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Assets', [
            'foreignKey' => 'asset_id',
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
            ->integer('bidding_id')
            // ->requirePresence('bidding_id', 'create')
            ->notEmptyString('bidding_id');

        $validator
            ->integer('asset_id')
            ->requirePresence('asset_id', 'create')
            ->notEmptyString('asset_id');

        $validator
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->integer('approved_qty')
            ->allowEmptyString('approved_qty');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->decimal('total_payable')
            ->requirePresence('total_payable', 'create')
            ->notEmptyString('total_payable');

        $validator
            ->decimal('approved_payable')
            ->allowEmptyString('approved_payable');

        $validator
            ->integer('status_id')
            ->requirePresence('status_id', 'create')
            ->notEmptyString('status_id');

        $validator
            ->scalar('remark')
            ->maxLength('remark', 255)
            ->allowEmptyString('remark');

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
        $rules->add($rules->existsIn('bidding_id', 'Biddings'), ['errorField' => 'bidding_id']);
        $rules->add($rules->existsIn('asset_id', 'Assets'), ['errorField' => 'asset_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
