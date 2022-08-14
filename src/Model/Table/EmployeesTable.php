<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\GradesTable&\Cake\ORM\Association\BelongsTo $Grades
 * @property \App\Model\Table\SectionsTable&\Cake\ORM\Association\BelongsTo $Sections
 * @property \App\Model\Table\CadresTable&\Cake\ORM\Association\BelongsTo $Cadres
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\ReligionsTable&\Cake\ORM\Association\BelongsTo $Religions
 * @property \App\Model\Table\LocalsTable&\Cake\ORM\Association\BelongsTo $Locals
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\PhysicalPosturesTable&\Cake\ORM\Association\BelongsTo $PhysicalPostures
 * @property \App\Model\Table\MaritalStatusesTable&\Cake\ORM\Association\BelongsTo $MaritalStatuses
 * @property \App\Model\Table\HighestEducationsTable&\Cake\ORM\Association\BelongsTo $HighestEducations
 * @property \App\Model\Table\DesignationsTable&\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\ChildrenDetailsTable&\Cake\ORM\Association\HasMany $ChildrenDetails
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\HasMany $Companies
 * @property \App\Model\Table\EducationsTable&\Cake\ORM\Association\HasMany $Educations
 * @property \App\Model\Table\LeavesTable&\Cake\ORM\Association\HasMany $Leaves
 * @property \App\Model\Table\NextOfKinsTable&\Cake\ORM\Association\HasMany $NextOfKins
 * @property \App\Model\Table\OtherDepartmentsTable&\Cake\ORM\Association\HasMany $OtherDepartments
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\WorkDetailsTable&\Cake\ORM\Association\HasMany $WorkDetails
 *
 * @method \App\Model\Entity\Employee newEmptyEntity()
 * @method \App\Model\Entity\Employee newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->belongsTo(
            'ServiceCharges', [
            'className' => 'Banks',
            'foreignKey' => 'service_charge_bank',
            'joinType' => 'INNER'
            ]
        );

        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
        ]);
        $this->belongsTo('Grades', [
            'foreignKey' => 'grade_id',
        ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id',
        ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id',
        ]);
        $this->belongsTo('Cadres', [
            'foreignKey' => 'cadre_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Religions', [
            'foreignKey' => 'religion_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Locals', [
            'foreignKey' => 'local_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PhysicalPostures', [
            'foreignKey' => 'physical_posture_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MaritalStatuses', [
            'foreignKey' => 'marital_status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('HighestEducations', [
            'foreignKey' => 'highest_education_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'className' => 'CakeDC/Users.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('ChildrenDetails', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('Companies', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('Educations', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('Leaves', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('NextOfKins', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('OtherDepartments', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'employee_id',
        ]);
        $this->hasMany('WorkDetails', [
            'foreignKey' => 'employee_id',
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
            ->integer('branch_id')
            ->allowEmptyString('branch_id');

        $validator
            ->integer('staff_no')
            ->allowEmptyString('staff_no');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 19)
            ->notEmptyString('first_name','First name is required');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 14)
            ->notEmptyString('last_name','Last name is required');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 11)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('other_name')
            ->maxLength('other_name', 255)
            ->allowEmptyString('other_name');

        $validator
            ->scalar('reporting_to')
            ->maxLength('reporting_to', 255)
            ->allowEmptyString('reporting_to');

        $validator
            ->scalar('name_of_spouse')
            ->maxLength('name_of_spouse', 255)
            ->allowEmptyString('name_of_spouse');

        $validator
            ->integer('years_of_experience')
            ->requirePresence('years_of_experience', 'create')
            ->notEmptyString('years_of_experience');

        $validator
            ->integer('grade_id')
            ->allowEmptyString('grade_id');

        $validator
            ->decimal('salary')
            ->allowEmptyString('salary');

        $validator
            ->decimal('transport_allowance')
            ->allowEmptyString('transport_allowance');

        $validator
            ->decimal('housing_allowance')
            ->allowEmptyString('housing_allowance');

        $validator
            ->decimal('utility_allowance')
            ->allowEmptyString('utility_allowance');

        $validator
            ->decimal('leave_allowance')
            ->allowEmptyString('leave_allowance');

        $validator
            ->integer('section_id')
            ->allowEmptyString('section_id');

        $validator
            ->integer('cadre_id')
            ->requirePresence('cadre_id', 'create')
            ->notEmptyString('cadre_id');

        $validator
            ->integer('bank_id')
            ->requirePresence('bank_id', 'create')
            ->notEmptyString('bank_id');

        $validator
            ->scalar('acct_no')
            ->maxLength('acct_no', 10)
            ->allowEmptyString('acct_no');

        $validator
            ->integer('service_charge_bank')
            ->allowEmptyString('service_charge_bank');

        $validator
            ->scalar('service_charge_number')
            ->maxLength('service_charge_number', 10)
            ->allowEmptyString('service_charge_number');

        $validator
            ->integer('gender_id')
            ->requirePresence('gender_id', 'create')
            ->notEmptyString('gender_id');

        $validator
            ->integer('religion_id')
            ->requirePresence('religion_id', 'create')
            ->notEmptyString('religion_id');

        $validator
            ->integer('local_id')
            ->requirePresence('local_id', 'create')
            ->notEmptyString('local_id');

        $validator
            ->scalar('home_town')
            ->maxLength('home_town', 255)
            ->requirePresence('home_town', 'create')
            ->notEmptyString('home_town');

        $validator
            ->integer('state_id')
            ->requirePresence('state_id', 'create')
            ->notEmptyString('state_id');

        $validator
            ->integer('physical_posture_id')
            ->requirePresence('physical_posture_id', 'create')
            ->notEmptyString('physical_posture_id');

        $validator
            ->integer('marital_status_id')
            ->requirePresence('marital_status_id', 'create')
            ->notEmptyString('marital_status_id');

        $validator
            ->integer('highest_education_id')
            ->requirePresence('highest_education_id', 'create')
            ->notEmptyString('highest_education_id');

        $validator
            ->scalar('housing_upfront')
            ->maxLength('housing_upfront', 1)
            ->allowEmptyString('housing_upfront');

        $validator
            ->integer('designation_id')
            ->allowEmptyString('designation_id');

        $validator
            ->integer('status_id')
            // ->requirePresence('status_id', 'create')
            // ->notEmptyString('status_id')
            ;

        $validator
            ->date('date_of_birth')
            ->allowEmptyDate('date_of_birth');

        $validator
            ->date('date_joined')
            ->allowEmptyDate('date_joined');

        $validator
            ->decimal('domestic_allowance')
            ->allowEmptyString('domestic_allowance');

        $validator
            ->scalar('tax_number')
            ->maxLength('tax_number', 10)
            ->allowEmptyString('tax_number');

        $validator
            ->scalar('tax_relief')
            ->maxLength('tax_relief', 10)
            ->allowEmptyString('tax_relief');

        $validator
            ->scalar('tax_paid_to_date')
            ->maxLength('tax_paid_to_date', 10)
            ->allowEmptyString('tax_paid_to_date');

        $validator
            ->scalar('pension_no')
            ->maxLength('pension_no', 15)
            ->allowEmptyString('pension_no');

        $validator
            ->decimal('medical_allowance')
            ->allowEmptyString('medical_allowance');

        $validator
            ->decimal('entertainment_allowance')
            ->allowEmptyString('entertainment_allowance');

        $validator
            ->decimal('other_allowance')
            ->allowEmptyString('other_allowance');

        $validator
            ->decimal('personal_loan')
            ->allowEmptyString('personal_loan');

        $validator
            ->decimal('pers_loan_rep')
            ->allowEmptyString('pers_loan_rep');

        $validator
            ->decimal('pers_loan_paid')
            ->allowEmptyString('pers_loan_paid');

        $validator
            ->integer('pers_loan_inst')
            ->allowEmptyString('pers_loan_inst');

        $validator
            ->decimal('car_loan')
            ->allowEmptyString('car_loan');

        $validator
            ->decimal('car_loan_rep')
            ->allowEmptyString('car_loan_rep');

        $validator
            ->integer('car_loan_inst')
            ->allowEmptyString('car_loan_inst');

        $validator
            ->decimal('car_loan_paid')
            ->allowEmptyString('car_loan_paid');

        $validator
            ->decimal('whl_cics')
            ->allowEmptyString('whl_cics');

        $validator
            ->scalar('pension_control')
            ->maxLength('pension_control', 10)
            ->allowEmptyString('pension_control');

        $validator
            ->decimal('salary_advance')
            ->allowEmptyString('salary_advance');

        $validator
            ->decimal('salary_advance_rep')
            ->allowEmptyString('salary_advance_rep');

        $validator
            ->decimal('salary_advance_paid')
            ->allowEmptyString('salary_advance_paid');

        $validator
            ->decimal('salary_advance_inst')
            ->allowEmptyString('salary_advance_inst');

        $validator
            ->decimal('drivers_allowance')
            ->allowEmptyString('drivers_allowance');

        $validator
            ->decimal('bro_cics')
            ->allowEmptyString('bro_cics');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->scalar('contribution')
            ->allowEmptyString('contribution');

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
        $rules->add($rules->existsIn('branch_id', 'Branches'), ['errorField' => 'branch_id']);
        $rules->add($rules->existsIn('grade_id', 'Grades'), ['errorField' => 'grade_id']);
        $rules->add($rules->existsIn('section_id', 'Sections'), ['errorField' => 'section_id']);
        $rules->add($rules->existsIn('cadre_id', 'Cadres'), ['errorField' => 'cadre_id']);
        $rules->add($rules->existsIn('bank_id', 'Banks'), ['errorField' => 'bank_id']);
        $rules->add($rules->existsIn('gender_id', 'Genders'), ['errorField' => 'gender_id']);
        $rules->add($rules->existsIn('religion_id', 'Religions'), ['errorField' => 'religion_id']);
        $rules->add($rules->existsIn('local_id', 'Locals'), ['errorField' => 'local_id']);
        $rules->add($rules->existsIn('state_id', 'States'), ['errorField' => 'state_id']);
        $rules->add($rules->existsIn('physical_posture_id', 'PhysicalPostures'), ['errorField' => 'physical_posture_id']);
        $rules->add($rules->existsIn('marital_status_id', 'MaritalStatuses'), ['errorField' => 'marital_status_id']);
        $rules->add($rules->existsIn('highest_education_id', 'HighestEducations'), ['errorField' => 'highest_education_id']);
        $rules->add($rules->existsIn('designation_id', 'Designations'), ['errorField' => 'designation_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        
        $rules->add($rules->isUnique(
            ['staff_no'],
            'This staff No has already been used.'
        ));

        $rules->add($rules->isUnique(
            ['email'],
            'This email has already been used.'
        ));
        
        $rules->add($rules->isUnique(
            ['phone'],
            'This phone has already been used.'
        ));

        return $rules;
    }
}
