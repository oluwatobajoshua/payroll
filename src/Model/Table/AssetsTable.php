<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assets Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\AuctionDetailsTable&\Cake\ORM\Association\HasMany $AuctionDetails
 *
 * @method \App\Model\Entity\Asset newEmptyEntity()
 * @method \App\Model\Entity\Asset newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Asset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asset findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Asset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asset[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asset|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asset saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AssetsTable extends Table
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

        $this->setTable('assets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('AuctionDetails', [
            'foreignKey' => 'asset_id',
        ]);
        $this->hasMany('BiddingDetails', [
            'foreignKey' => 'asset_id',
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
            ->scalar('code')
            ->maxLength('code', 255)
            ->allowEmptyString('code');

        $validator
            ->scalar('item')
            ->maxLength('item', 255)
            ->allowEmptyString('item');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmptyString('model');

        $validator
            ->scalar('date_of_purchase')
            ->maxLength('date_of_purchase', 255)
            ->allowEmptyString('date_of_purchase');

        $validator
            ->integer('qty_available')
            ->allowEmptyString('qty_available');

        $validator
            ->integer('qty_bidded')
            ->notEmptyString('qty_bidded');

        $validator
            ->integer('qty_left')
            ->notEmptyString('qty_left');

        $validator
            ->decimal('reserved_price')
            ->allowEmptyString('reserved_price');

        $validator
            ->integer('location_id')
            ->allowEmptyString('location_id');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

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
        $rules->add($rules->existsIn('location_id', 'Locations'), ['errorField' => 'location_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
