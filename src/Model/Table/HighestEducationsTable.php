<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HighestEducations Model
 *
 * @property \App\Model\Table\EducationsTable&\Cake\ORM\Association\HasMany $Educations
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\HighestEducation newEmptyEntity()
 * @method \App\Model\Entity\HighestEducation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HighestEducation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HighestEducation get($primaryKey, $options = [])
 * @method \App\Model\Entity\HighestEducation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HighestEducation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HighestEducation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HighestEducation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HighestEducation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HighestEducation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HighestEducation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HighestEducation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HighestEducation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HighestEducationsTable extends Table
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

        $this->setTable('highest_educations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Educations', [
            'foreignKey' => 'highest_education_id',
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'highest_education_id',
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
            ->integer('sort')
            ->requirePresence('sort', 'create')
            ->notEmptyString('sort');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
