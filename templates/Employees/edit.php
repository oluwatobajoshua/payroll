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
        <div class="callout callout-info">
          <?= $this->Form->create(null, ['id' => 'empForm']) ?>
          <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
            ]);
            echo $this->Form->control('addressCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $addressCount]);
            echo $this->Form->control('workCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $workCount]);
            echo $this->Form->control('childCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $childCount]);
            echo $this->Form->control('educationCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $educationCount]);
            ?>
          </div>
          <?= $this->Form->end() ?>
        </div>
      </div><!-- /.col -->
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
              // echo $this->Form->control('gender_id', ['options' => $genders]);
              // echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
              // echo $this->Form->control('state_id', ['options' => $states]);
              // echo $this->Form->control('local_id', ['options' => $locals]);
              // echo $this->Form->control('religion_id', ['options' => $religions]);
              // echo $this->Form->control('home_town');
              // echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
              // echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
              // echo $this->Form->control('years_of_experience');
              // echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
              echo $this->Form->control('grade_id', ['options' => $grades, 'empty' => true]);
              echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
              echo $this->Form->control('cadre_id', ['options' => $cadres]);
              echo $this->Form->control('phone');
              echo $this->Form->control('email');
              // echo $this->Form->control('reporting_to');
              // echo $this->Form->control('name_of_spouse');
              // echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
              // echo $this->Form->control('date_of_birth');
              // echo $this->Form->control('date_joined', ['empty' => true]);
              echo $this->Form->control('bank_id', ['options' => $banks]);
              echo $this->Form->control('acct_no');
              echo $this->Form->control('service_charge_bank', ['options' => $serviceCharges]);
              echo $this->Form->control('service_charge_number');
              ?>
            </div>
            <!-- <h3>Address Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-6 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($i = 0; $i < $addressCount; $i++) {
                echo $this->Form->control('addresses.' . $i . '.id');
                echo $this->Form->control('addresses.' . $i . '.name', ['label' => 'Address']);
                echo $this->Form->control('addresses.' . $i . '.address_type_id', ['options' => $addressTypes]);
              }
              ?>
            </div>
            <h3>Next Of Kin Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($i = 0; $i < $nextOfKinCount; $i++) {
                echo $this->Form->control('next_of_kins.0.id');
                echo $this->Form->control('next_of_kins.0.name');
                echo $this->Form->control('next_of_kins.0.relationship_id', ['options' => $relationships]);
                echo $this->Form->control('next_of_kins.0.address');
                echo $this->Form->control('next_of_kins.0.phone');
                echo $this->Form->control('next_of_kins.0.email');
              }
              ?>
            </div>
            <h3>Work History Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-2 col-xs-2 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($w = 0; $w < $workCount; $w++) {
                echo $this->Form->control('work_details.' . $w . '.id');
                echo $this->Form->control('work_details.' . $w . '.organization');
                echo $this->Form->control('work_details.' . $w . '.department');
                echo $this->Form->control('work_details.' . $w . '.job_title');
                echo $this->Form->control('work_details.' . $w . '.job_class');
                echo $this->Form->control('work_details.' . $w . '.start_date', ['day' => false, 'minYear' => 1900]);
                echo $this->Form->control('work_details.' . $w . '.end_date', ['minYear' => 1900]);
              }
              ?>
            </div>
            <h3>Children Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($i = 0; $i < $childCount; $i++) {
                echo $this->Form->control('children_details.' . $i . '.id');
                echo $this->Form->control('children_details.' . $i . '.name');
                echo $this->Form->control('children_details.' . $i . '.date_of_birth', ['minYear' => 1900]);
                echo $this->Form->control('children_details.' . $i . '.gender_id', ['options' => $genders]);
              }
              ?>
            </div>
            <h3>Education Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($e = 0; $e < $educationCount; $e++) {
                echo $this->Form->control('educations.' . $e . '.id');
                echo $this->Form->control('educations.' . $e . '.institution');
                echo $this->Form->control('educations.' . $e . '.highest_education_id', ['options' => $highestEducations]);
                echo $this->Form->control('educations.' . $e . '.course_of_study');
                echo $this->Form->control('educations.' . $e . '.date', ['minYear' => 1900]);
              }
              ?>
            </div>
            <h3>Other Department Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-6 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              for ($od = 0; $od < $otherDepartmentCount; $od++) {
                echo $this->Form->control('other_departments.' . $od . '.id');
                echo $this->Form->control('other_departments.' . $od . '.department_id', ['options' => $sections, 'empty' => 'Other department', 'label' => 'Other Department']);
                echo $this->Form->control('other_departments.' . $od . '.comment', ['label' => 'Comment/Reason']);
              }
              ?>
            </div>
            <h3>Contribution</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-12 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              echo $this->Form->control('contribution');
              ?>
            </div> -->
            <h3>Payment Information</h3>
            <div class="row">
              <?php
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-2 col-xs-6 {{type}} {{required}}">{{content}}</div>'
              ]);
              echo $this->Form->control('bank_id', ['options' => $banks]);
              echo $this->Form->control('acct_no');
              echo $this->Form->control('service_charge_bank', ['options' => $serviceCharges]);
              echo $this->Form->control('service_charge_number');
              echo $this->Form->control('salary');
              echo $this->Form->control('housing_allowance');
              echo $this->Form->control('housing_upfront');
              echo $this->Form->control('utility_allowance');
              echo $this->Form->control('transport_allowance');
              echo $this->Form->control('domestic_allowance');
              echo $this->Form->control('tax_number');
              echo $this->Form->control('tax_paid_to_date');
              echo $this->Form->control('pension_no');
              echo $this->Form->control('medical_allowance');
              echo $this->Form->control('entertainment_allowance');
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