<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
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

<div class="card card-primary card-outline">
  <?= $this->Form->create($employee) ?>
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
      echo $this->Form->control('gender_id', ['options' => $genders]);
      echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
      echo $this->Form->control('state_id', ['options' => $states]);
      echo $this->Form->control('local_id', ['options' => $locals]);
      echo $this->Form->control('religion_id', ['options' => $religions]);
      echo $this->Form->control('home_town');
      echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
      echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
      echo $this->Form->control('years_of_experience');
      echo $this->Form->control('branch_id', ['options' => $branches, 'empty' => true]);
      echo $this->Form->control('grade_id', ['options' => $grades, 'empty' => true]);
      echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
      echo $this->Form->control('cadre_id', ['options' => $cadres]);
      echo $this->Form->control('phone');
      echo $this->Form->control('email');
      echo $this->Form->control('reporting_to');
      echo $this->Form->control('name_of_spouse');
      echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
      echo $this->Form->control('date_of_birth', ['type' => 'date']);
      echo $this->Form->control('date_joined', ['empty' => true]);
      echo $this->Form->control('bank_id', ['options' => $banks]);
      echo $this->Form->control('acct_no');
      echo $this->Form->control('service_charge_bank',['options' => $serviceCharges]);
      echo $this->Form->control('service_charge_number');      
      echo $this->Form->control('contribution',['rows' => 2]);
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

