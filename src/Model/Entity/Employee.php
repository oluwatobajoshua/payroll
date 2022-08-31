<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int|null $branch_id
 * @property int|null $staff_no
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $phone
 * @property string|null $email
 * @property string|null $other_name
 * @property string|null $reporting_to
 * @property string|null $name_of_spouse
 * @property int $years_of_experience
 * @property int|null $grade_id
 * @property string|null $salary
 * @property string|null $transport_allowance
 * @property string|null $housing_allowance
 * @property string|null $utility_allowance
 * @property string|null $leave_allowance
 * @property int|null $section_id
 * @property int $cadre_id
 * @property int $bank_id
 * @property string|null $acct_no
 * @property int|null $service_charge_bank
 * @property string|null $service_charge_number
 * @property int $gender_id
 * @property int $religion_id
 * @property int $local_id
 * @property string $home_town
 * @property int $state_id
 * @property int $physical_posture_id
 * @property int $marital_status_id
 * @property int $highest_education_id
 * @property string|null $housing_upfront
 * @property int|null $designation_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenDate|null $date_of_birth
 * @property \Cake\I18n\FrozenDate|null $date_joined
 * @property string|null $domestic_allowance
 * @property string|null $tax_number
 * @property string|null $tax_relief
 * @property string|null $tax_paid_to_date
 * @property string|null $pension_no
 * @property string|null $medical_allowance
 * @property string|null $entertainment_allowance
 * @property string|null $other_allowance
 * @property string|null $personal_loan
 * @property string|null $pers_loan_rep
 * @property string|null $pers_loan_paid
 * @property int|null $pers_loan_inst
 * @property string|null $car_loan
 * @property string|null $car_loan_rep
 * @property int|null $car_loan_inst
 * @property string|null $car_loan_paid
 * @property string|null $whl_cics
 * @property string|null $pension_control
 * @property string|null $salary_advance
 * @property string|null $salary_advance_rep
 * @property string|null $salary_advance_paid
 * @property string|null $salary_advance_inst
 * @property string|null $drivers_allowance
 * @property string|null $bro_cics
 * @property int|null $user_id
 * @property string|null $contribution
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Grade $grade
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\Cadre $cadre
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\Religion $religion
 * @property \App\Model\Entity\Local $local
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\PhysicalPosture $physical_posture
 * @property \App\Model\Entity\MaritalStatus $marital_status
 * @property \App\Model\Entity\HighestEducation $highest_education
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Status $status
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\ChildrenDetail[] $children_details
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Education[] $educations
 * @property \App\Model\Entity\Leave[] $leaves
 * @property \App\Model\Entity\NextOfKin[] $next_of_kins
 * @property \App\Model\Entity\OtherDepartment[] $other_departments
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Users1[] $users1
 * @property \App\Model\Entity\WorkDetail[] $work_details
 */
class Employee extends Entity
{
    /**
     *  Return Full name
     */
     
    protected function _getFullName()
    {
        return strtoupper($this->first_name . '  ' . $this->last_name);
    } 
    
    protected $_virtual = ['full_name'];
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
        'branch_id' => true,
        'staff_no' => true,
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'email' => true,
        'other_name' => true,
        'reporting_to' => true,
        'name_of_spouse' => true,
        'years_of_experience' => true,
        'grade_id' => true,
        'salary' => true,
        'transport_allowance' => true,
        'housing_allowance' => true,
        'utility_allowance' => true,
        'leave_allowance' => true,
        'section_id' => true,
        'cadre_id' => true,
        'bank_id' => true,
        'acct_no' => true,
        'service_charge_bank' => true,
        'service_charge_number' => true,
        'gender_id' => true,
        'religion_id' => true,
        'local_id' => true,
        'home_town' => true,
        'state_id' => true,
        'physical_posture_id' => true,
        'marital_status_id' => true,
        'highest_education_id' => true,
        'housing_upfront' => true,
        'designation_id' => true,
        'status_id' => true,
        'date_of_birth' => true,
        'date_joined' => true,
        'domestic_allowance' => true,
        'tax_number' => true,
        'tax_relief' => true,
        'tax_paid_to_date' => true,
        'pension_no' => true,
        'medical_allowance' => true,
        'entertainment_allowance' => true,
        'other_allowance' => true,
        'personal_loan' => true,
        'pers_loan_rep' => true,
        'pers_loan_paid' => true,
        'pers_loan_inst' => true,
        'car_loan' => true,
        'car_loan_rep' => true,
        'car_loan_inst' => true,
        'car_loan_paid' => true,
        'whl_cics' => true,
        'pension_control' => true,
        'salary_advance' => true,
        'salary_advance_rep' => true,
        'salary_advance_paid' => true,
        'salary_advance_inst' => true,
        'drivers_allowance' => true,
        'bro_cics' => true,
        'user_id' => true,
        'contribution' => true,
        'created' => true,
        'modified' => true,
        'branch' => true,
        'grade' => true,
        'section' => true,
        'cadre' => true,
        'bank' => true,
        'gender' => true,
        'religion' => true,
        'local' => true,
        'state' => true,
        'physical_posture' => true,
        'marital_status' => true,
        'highest_education' => true,
        'designation' => true,
        'status' => true,
        'user' => true,
        'addresses' => true,
        'children_details' => true,
        'companies' => true,
        'educations' => true,
        'leaves' => true,
        'next_of_kins' => true,
        'other_departments' => true,
        'transactions' => true,
        'users1' => true,
        'work_details' => true,
    ];
}
