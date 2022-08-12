<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<?php
$this->assign('title', __('Add Employee'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($employee) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
      echo $this->Form->control('staff_no');
      echo $this->Form->control('first_name');
      echo $this->Form->control('last_name');
      echo $this->Form->control('phone');
      echo $this->Form->control('email');
      echo $this->Form->control('other_name');
      echo $this->Form->control('reporting_to');
      echo $this->Form->control('name_of_spouse');
      echo $this->Form->control('years_of_experience');
      echo $this->Form->control('grade_id', ['options' => $grades, 'empty' => true]);
      echo $this->Form->control('salary');
      echo $this->Form->control('transport_allowance');
      echo $this->Form->control('housing_allowance');
      echo $this->Form->control('utility_allowance');
      echo $this->Form->control('leave_allowance');
      echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
      echo $this->Form->control('cadre_id', ['options' => $cadres]);
      echo $this->Form->control('bank_id', ['options' => $banks]);
      echo $this->Form->control('acct_no');
      echo $this->Form->control('service_charge_bank');
      echo $this->Form->control('service_charge_number');
      echo $this->Form->control('gender_id', ['options' => $genders]);
      echo $this->Form->control('religion_id', ['options' => $religions]);
      echo $this->Form->control('local_id', ['options' => $locals]);
      echo $this->Form->control('home_town');
      echo $this->Form->control('state_of_origin_id');
      echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
      echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
      echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
      echo $this->Form->control('housing_upfront');
      echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
      echo $this->Form->control('status_id', ['options' => $statuses]);
      echo $this->Form->control('date_of_birth', ['empty' => true]);
      echo $this->Form->control('date_joined', ['empty' => true]);
      echo $this->Form->control('domestic_allowance');
      echo $this->Form->control('tax_number');
      echo $this->Form->control('tax_relief');
      echo $this->Form->control('tax_paid_to_date');
      echo $this->Form->control('pension_no');
      echo $this->Form->control('medical_allowance');
      echo $this->Form->control('entertainment_allowance');
      echo $this->Form->control('other_allowance');
      echo $this->Form->control('personal_loan');
      echo $this->Form->control('pers_loan_rep');
      echo $this->Form->control('pers_loan_paid');
      echo $this->Form->control('pers_loan_inst');
      echo $this->Form->control('car_loan');
      echo $this->Form->control('car_loan_rep');
      echo $this->Form->control('car_loan_inst');
      echo $this->Form->control('car_loan_paid');
      echo $this->Form->control('whl_cics');
      echo $this->Form->control('pension_control');
      echo $this->Form->control('salary_advance');
      echo $this->Form->control('salary_advance_rep');
      echo $this->Form->control('salary_advance_paid');
      echo $this->Form->control('salary_advance_inst');
      echo $this->Form->control('drivers_allowance');
      echo $this->Form->control('bro_cics');
      echo $this->Form->control('user_id');
      echo $this->Form->control('contribution');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

