<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
// debug($this->Url->build(['controller' => 'Employees', 'action' => 'ajax']));
?>
<?php
$this->assign('title', __('Edit Employee'));
$this->Breadcrumbs->add([
  ['title' => 'Home', 'url' => '/'],
  ['title' => 'List Employees', 'url' => ['action' => 'index']],
  ['title' => 'View', 'url' => ['action' => 'view', $employee->id]],
  ['title' => 'Edit'],
]);
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="invoice">
          <?= $this->Form->create($employee, ['id' => 'emp']) ?>
          <div class="card-body">
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              echo $this->Form->control('staff_no');
              echo $this->Form->control('first_name');
              echo $this->Form->control('last_name');
              echo $this->Form->control('other_name');
              echo $this->Form->control('gender_id', ['options' => $genders, 'readonly' => true]);
              echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
              echo $this->Form->control('grade_id', ['options' => $grades, 'empty' => true]);
              echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
              echo $this->Form->control('cadre_id', ['options' => $cadres]);
              echo $this->Form->control('phone',['readonly' => true]);
              echo $this->Form->control('email',['readonly' => true]);
              ?>
            </div><br>            
            <h3>Payment Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              echo $this->Form->control('salary');
              echo $this->Form->control('bank_id', ['options' => $banks]);
              echo $this->Form->control('acct_no');
              echo $this->Form->control('service_charge_bank', ['options' => $serviceCharges]);
              echo $this->Form->control('service_charge_number');              
              echo $this->Form->control('housing_allowance');
              echo $this->Form->control('housing_upfront');
              echo $this->Form->control('utility_allowance');
              echo $this->Form->control('transport_allowance');
              echo $this->Form->control('domestic_allowance');
              echo $this->Form->control('tax_number');
              echo $this->Form->control('tax_paid_to_date');
              echo $this->Form->control('pension_no');
              echo $this->Form->control('medical_allowance');
              echo $this->Form->control('entertainment_allowance',['label'=>'Ent. Allowance']);
              echo $this->Form->control('other_allowance');
              echo $this->Form->control('car_loan');
              echo $this->Form->control('car_loan_rep');
              echo $this->Form->control('salary_advance');
              echo $this->Form->control('salary_advance_rep');
              echo $this->Form->control('salary_advance_paid');
              echo $this->Form->control('salary_advance_inst');
              echo $this->Form->control('drivers_allowance');
              echo $this->Form->control('bro_cics');
              echo $this->Form->control('personal_loan');
              echo $this->Form->control('pers_loan_rep');
              echo $this->Form->control('pers_loan_paid');
              echo $this->Form->control('pers_loan_inst');
              echo $this->Form->control('car_loan_inst');
              echo $this->Form->control('car_loan_paid');
              echo $this->Form->control('whl_cics');
              echo $this->Form->control('pension_control');
              echo $this->Form->control('tax_relief');
              ?>
            </div>
          </div>
          <div class="card-footer d-flex">
            <div class="">
              <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'btn btn-danger']
              ) ?>
            </div>
            <div class="ml-auto">
              <?= $this->Form->button(__('Save')) ?>
              <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
            </div>
          </div>
          <?= $this->Form->end() ?>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>