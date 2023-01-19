<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuctionDetails Model
 *
 * @property \App\Model\Table\AuctionsTable&\Cake\ORM\Association\BelongsTo $Auctions
 * @property \App\Model\Table\AssetsTable&\Cake\ORM\Association\BelongsTo $Assets
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\AuctionDetail newEmptyEntity()
 * @method \App\Model\Entity\AuctionDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AuctionDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuctionDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuctionDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AuctionDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuctionDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuctionDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuctionDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuctionDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AuctionDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AuctionDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AuctionDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuctionDetailsTable extends Table
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

        $this->setTable('auction_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Auctions', [
            'foreignKey' => 'auction_id',
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
            ->integer('auction_id')
            ->requirePresence('auction_id', 'create')
            ->notEmptyString('auction_id');

        $validator
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

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
        $rules->add($rules->existsIn('auction_id', 'Auctions'), ['errorField' => 'auction_id']);
        $rules->add($rules->existsIn('asset_id', 'Assets'), ['errorField' => 'asset_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
