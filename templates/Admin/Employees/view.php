<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<?php
$this->assign('title', __('Employee'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($employee->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Branch') ?></th>
            <td><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($employee->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($employee->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($employee->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($employee->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Name') ?></th>
            <td><?= h($employee->other_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Reporting To') ?></th>
            <td><?= h($employee->reporting_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Of Spouse') ?></th>
            <td><?= h($employee->name_of_spouse) ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $employee->has('grade') ? $this->Html->link($employee->grade->name, ['controller' => 'Grades', 'action' => 'view', $employee->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Section') ?></th>
            <td><?= $employee->has('section') ? $this->Html->link($employee->section->name, ['controller' => 'Sections', 'action' => 'view', $employee->section->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cadre') ?></th>
            <td><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bank') ?></th>
            <td><?= $employee->has('bank') ? $this->Html->link($employee->bank->name, ['controller' => 'Banks', 'action' => 'view', $employee->bank->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Acct No') ?></th>
            <td><?= h($employee->acct_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Charge Number') ?></th>
            <td><?= h($employee->service_charge_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= $employee->has('gender') ? $this->Html->link($employee->gender->name, ['controller' => 'Genders', 'action' => 'view', $employee->gender->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Religion') ?></th>
            <td><?= $employee->has('religion') ? $this->Html->link($employee->religion->name, ['controller' => 'Religions', 'action' => 'view', $employee->religion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Local') ?></th>
            <td><?= $employee->has('local') ? $this->Html->link($employee->local->name, ['controller' => 'Locals', 'action' => 'view', $employee->local->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Home Town') ?></th>
            <td><?= h($employee->home_town) ?></td>
        </tr>
        <tr>
            <th><?= __('Physical Posture') ?></th>
            <td><?= $employee->has('physical_posture') ? $this->Html->link($employee->physical_posture->name, ['controller' => 'PhysicalPostures', 'action' => 'view', $employee->physical_posture->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Marital Status') ?></th>
            <td><?= $employee->has('marital_status') ? $this->Html->link($employee->marital_status->name, ['controller' => 'MaritalStatuses', 'action' => 'view', $employee->marital_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Highest Education') ?></th>
            <td><?= $employee->has('highest_education') ? $this->Html->link($employee->highest_education->name, ['controller' => 'HighestEducations', 'action' => 'view', $employee->highest_education->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Housing Upfront') ?></th>
            <td><?= h($employee->housing_upfront) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= $employee->has('designation') ? $this->Html->link($employee->designation->name, ['controller' => 'Designations', 'action' => 'view', $employee->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Number') ?></th>
            <td><?= h($employee->tax_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Relief') ?></th>
            <td><?= h($employee->tax_relief) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Paid To Date') ?></th>
            <td><?= h($employee->tax_paid_to_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Pension No') ?></th>
            <td><?= h($employee->pension_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Pension Control') ?></th>
            <td><?= h($employee->pension_control) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Staff No') ?></th>
            <td><?= $this->Number->format($employee->staff_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Years Of Experience') ?></th>
            <td><?= $this->Number->format($employee->years_of_experience) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary') ?></th>
            <td><?= $this->Number->format($employee->salary) ?></td>
        </tr>
        <tr>
            <th><?= __('Transport Allowance') ?></th>
            <td><?= $this->Number->format($employee->transport_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Housing Allowance') ?></th>
            <td><?= $this->Number->format($employee->housing_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Utility Allowance') ?></th>
            <td><?= $this->Number->format($employee->utility_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Allowance') ?></th>
            <td><?= $this->Number->format($employee->leave_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Charge Bank') ?></th>
            <td><?= $this->Number->format($employee->service_charge_bank) ?></td>
        </tr>
        <tr>
            <th><?= __('State Of Origin Id') ?></th>
            <td><?= $this->Number->format($employee->state_of_origin_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Domestic Allowance') ?></th>
            <td><?= $this->Number->format($employee->domestic_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Medical Allowance') ?></th>
            <td><?= $this->Number->format($employee->medical_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Entertainment Allowance') ?></th>
            <td><?= $this->Number->format($employee->entertainment_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Allowance') ?></th>
            <td><?= $this->Number->format($employee->other_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Personal Loan') ?></th>
            <td><?= $this->Number->format($employee->personal_loan) ?></td>
        </tr>
        <tr>
            <th><?= __('Pers Loan Rep') ?></th>
            <td><?= $this->Number->format($employee->pers_loan_rep) ?></td>
        </tr>
        <tr>
            <th><?= __('Pers Loan Paid') ?></th>
            <td><?= $this->Number->format($employee->pers_loan_paid) ?></td>
        </tr>
        <tr>
            <th><?= __('Pers Loan Inst') ?></th>
            <td><?= $this->Number->format($employee->pers_loan_inst) ?></td>
        </tr>
        <tr>
            <th><?= __('Car Loan') ?></th>
            <td><?= $this->Number->format($employee->car_loan) ?></td>
        </tr>
        <tr>
            <th><?= __('Car Loan Rep') ?></th>
            <td><?= $this->Number->format($employee->car_loan_rep) ?></td>
        </tr>
        <tr>
            <th><?= __('Car Loan Inst') ?></th>
            <td><?= $this->Number->format($employee->car_loan_inst) ?></td>
        </tr>
        <tr>
            <th><?= __('Car Loan Paid') ?></th>
            <td><?= $this->Number->format($employee->car_loan_paid) ?></td>
        </tr>
        <tr>
            <th><?= __('Whl Cics') ?></th>
            <td><?= $this->Number->format($employee->whl_cics) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Advance') ?></th>
            <td><?= $this->Number->format($employee->salary_advance) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Advance Rep') ?></th>
            <td><?= $this->Number->format($employee->salary_advance_rep) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Advance Paid') ?></th>
            <td><?= $this->Number->format($employee->salary_advance_paid) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Advance Inst') ?></th>
            <td><?= $this->Number->format($employee->salary_advance_inst) ?></td>
        </tr>
        <tr>
            <th><?= __('Drivers Allowance') ?></th>
            <td><?= $this->Number->format($employee->drivers_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Bro Cics') ?></th>
            <td><?= $this->Number->format($employee->bro_cics) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($employee->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($employee->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Joined') ?></th>
            <td><?= h($employee->date_joined) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($employee->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($employee->modified) ?></td>
        </tr>
    </table>
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
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Contribution') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($employee->contribution)); ?>
  </div>
</div>

<div class="related related-users view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Users') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Users' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Users' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Role Id') ?></th>
          <th><?= __('Role') ?></th>
          <th><?= __('Username') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Token') ?></th>
          <th><?= __('Token Expires') ?></th>
          <th><?= __('Api Token') ?></th>
          <th><?= __('Activation Date') ?></th>
          <th><?= __('Tos Date') ?></th>
          <th><?= __('Password') ?></th>
          <th><?= __('Raw Password') ?></th>
          <th><?= __('Active') ?></th>
          <th><?= __('Is Superuser') ?></th>
          <th><?= __('PasswdIsValid') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th><?= __('Last Login') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->users)) { ?>
        <tr>
            <td colspan="20" class="text-muted">
              Users record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->users as $users) : ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->employee_id) ?></td>
            <td><?= h($users->role_id) ?></td>
            <td><?= h($users->role) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->token) ?></td>
            <td><?= h($users->token_expires) ?></td>
            <td><?= h($users->api_token) ?></td>
            <td><?= h($users->activation_date) ?></td>
            <td><?= h($users->tos_date) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->raw_password) ?></td>
            <td><?= h($users->active) ?></td>
            <td><?= h($users->is_superuser) ?></td>
            <td><?= h($users->passwdIsValid) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>
            <td><?= h($users->last_login) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-addresses view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Addresses') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Addresses' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Addresses' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Address Type Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->addresses)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Addresses record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->addresses as $addresses) : ?>
        <tr>
            <td><?= h($addresses->id) ?></td>
            <td><?= h($addresses->employee_id) ?></td>
            <td><?= h($addresses->name) ?></td>
            <td><?= h($addresses->address_type_id) ?></td>
            <td><?= h($addresses->created) ?></td>
            <td><?= h($addresses->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-childrenDetails view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Children Details') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'ChildrenDetails' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'ChildrenDetails' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Date Of Birth') ?></th>
          <th><?= __('Gender Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->children_details)) { ?>
        <tr>
            <td colspan="8" class="text-muted">
              Children Details record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->children_details as $childrenDetails) : ?>
        <tr>
            <td><?= h($childrenDetails->id) ?></td>
            <td><?= h($childrenDetails->employee_id) ?></td>
            <td><?= h($childrenDetails->name) ?></td>
            <td><?= h($childrenDetails->date_of_birth) ?></td>
            <td><?= h($childrenDetails->gender_id) ?></td>
            <td><?= h($childrenDetails->created) ?></td>
            <td><?= h($childrenDetails->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'ChildrenDetails', 'action' => 'view', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'ChildrenDetails', 'action' => 'edit', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChildrenDetails', 'action' => 'delete', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $childrenDetails->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-companies view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Companies') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Companies' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Companies' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Rc') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Union Due') ?></th>
          <th><?= __('Company Leave') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->companies)) { ?>
        <tr>
            <td colspan="11" class="text-muted">
              Companies record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->companies as $companies) : ?>
        <tr>
            <td><?= h($companies->id) ?></td>
            <td><?= h($companies->rc) ?></td>
            <td><?= h($companies->address) ?></td>
            <td><?= h($companies->union_due) ?></td>
            <td><?= h($companies->company_leave) ?></td>
            <td><?= h($companies->date) ?></td>
            <td><?= h($companies->employee_id) ?></td>
            <td><?= h($companies->name) ?></td>
            <td><?= h($companies->created) ?></td>
            <td><?= h($companies->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-educations view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Educations') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Educations' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Educations' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Institution') ?></th>
          <th><?= __('Highest Education Id') ?></th>
          <th><?= __('Course Of Study') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->educations)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Educations record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->educations as $educations) : ?>
        <tr>
            <td><?= h($educations->id) ?></td>
            <td><?= h($educations->employee_id) ?></td>
            <td><?= h($educations->institution) ?></td>
            <td><?= h($educations->highest_education_id) ?></td>
            <td><?= h($educations->course_of_study) ?></td>
            <td><?= h($educations->date) ?></td>
            <td><?= h($educations->created) ?></td>
            <td><?= h($educations->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $educations->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $educations->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Educations', 'action' => 'delete', $educations->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $educations->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-leaves view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Leaves') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Leaves' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Leaves' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Days Entitled') ?></th>
          <th><?= __('Previous Outstanding') ?></th>
          <th><?= __('Days Requested') ?></th>
          <th><?= __('Outstanding Days') ?></th>
          <th><?= __('Commencement Date') ?></th>
          <th><?= __('Staff Signature') ?></th>
          <th><?= __('Relieving Officer') ?></th>
          <th><?= __('Hou Comments') ?></th>
          <th><?= __('Hod Comments') ?></th>
          <th><?= __('Hrm Comments') ?></th>
          <th><?= __('Md Comments') ?></th>
          <th><?= __('Status Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->leaves)) { ?>
        <tr>
            <td colspan="17" class="text-muted">
              Leaves record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->leaves as $leaves) : ?>
        <tr>
            <td><?= h($leaves->id) ?></td>
            <td><?= h($leaves->employee_id) ?></td>
            <td><?= h($leaves->days_entitled) ?></td>
            <td><?= h($leaves->previous_outstanding) ?></td>
            <td><?= h($leaves->days_requested) ?></td>
            <td><?= h($leaves->outstanding_days) ?></td>
            <td><?= h($leaves->commencement_date) ?></td>
            <td><?= h($leaves->staff_signature) ?></td>
            <td><?= h($leaves->relieving_officer) ?></td>
            <td><?= h($leaves->hou_comments) ?></td>
            <td><?= h($leaves->hod_comments) ?></td>
            <td><?= h($leaves->hrm_comments) ?></td>
            <td><?= h($leaves->md_comments) ?></td>
            <td><?= h($leaves->status_id) ?></td>
            <td><?= h($leaves->created) ?></td>
            <td><?= h($leaves->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Leaves', 'action' => 'view', $leaves->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Leaves', 'action' => 'edit', $leaves->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leaves', 'action' => 'delete', $leaves->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $leaves->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-nextOfKins view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Next Of Kins') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'NextOfKins' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'NextOfKins' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Relationship Id') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Phone') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->next_of_kins)) { ?>
        <tr>
            <td colspan="10" class="text-muted">
              Next Of Kins record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->next_of_kins as $nextOfKins) : ?>
        <tr>
            <td><?= h($nextOfKins->id) ?></td>
            <td><?= h($nextOfKins->employee_id) ?></td>
            <td><?= h($nextOfKins->name) ?></td>
            <td><?= h($nextOfKins->relationship_id) ?></td>
            <td><?= h($nextOfKins->address) ?></td>
            <td><?= h($nextOfKins->phone) ?></td>
            <td><?= h($nextOfKins->email) ?></td>
            <td><?= h($nextOfKins->created) ?></td>
            <td><?= h($nextOfKins->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'NextOfKins', 'action' => 'view', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'NextOfKins', 'action' => 'edit', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextOfKins', 'action' => 'delete', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $nextOfKins->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-otherDepartments view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Other Departments') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'OtherDepartments' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'OtherDepartments' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Section Id') ?></th>
          <th><?= __('Comment') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->other_departments)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Other Departments record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->other_departments as $otherDepartments) : ?>
        <tr>
            <td><?= h($otherDepartments->id) ?></td>
            <td><?= h($otherDepartments->employee_id) ?></td>
            <td><?= h($otherDepartments->section_id) ?></td>
            <td><?= h($otherDepartments->comment) ?></td>
            <td><?= h($otherDepartments->created) ?></td>
            <td><?= h($otherDepartments->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'OtherDepartments', 'action' => 'view', $otherDepartments->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'OtherDepartments', 'action' => 'edit', $otherDepartments->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'OtherDepartments', 'action' => 'delete', $otherDepartments->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $otherDepartments->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-transactions view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Transactions') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Transactions' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Transactions' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Company Id') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Basic Salary') ?></th>
          <th><?= __('Domestic Allowance') ?></th>
          <th><?= __('Housing Allowance') ?></th>
          <th><?= __('Transport Allowance') ?></th>
          <th><?= __('Utility Allowance') ?></th>
          <th><?= __('Living In Allowance') ?></th>
          <th><?= __('Medical Allowance') ?></th>
          <th><?= __('Entertainment Allowance') ?></th>
          <th><?= __('Leave Allowance') ?></th>
          <th><?= __('Other Allowance') ?></th>
          <th><?= __('Gross') ?></th>
          <th><?= __('Paye') ?></th>
          <th><?= __('Whl Cics') ?></th>
          <th><?= __('Pension Deduction') ?></th>
          <th><?= __('Other Deduction') ?></th>
          <th><?= __('Total Deduction') ?></th>
          <th><?= __('Net Pay') ?></th>
          <th><?= __('Salary Advance') ?></th>
          <th><?= __('Drivers Allowance') ?></th>
          <th><?= __('Bar Account') ?></th>
          <th><?= __('Union Due') ?></th>
          <th><?= __('Tax Amount') ?></th>
          <th><?= __('Arrears') ?></th>
          <th><?= __('Sc Deduction') ?></th>
          <th><?= __('Ileya Xmas Bonus') ?></th>
          <th><?= __('End Of Year Bonus') ?></th>
          <th><?= __('Service Charge') ?></th>
          <th><?= __('Personal Loan') ?></th>
          <th><?= __('Ctcs') ?></th>
          <th><?= __('Bro Cics') ?></th>
          <th><?= __('Surcharge') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->transactions)) { ?>
        <tr>
            <td colspan="36" class="text-muted">
              Transactions record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->transactions as $transactions) : ?>
        <tr>
            <td><?= h($transactions->id) ?></td>
            <td><?= h($transactions->employee_id) ?></td>
            <td><?= h($transactions->company_id) ?></td>
            <td><?= h($transactions->date) ?></td>
            <td><?= h($transactions->basic_salary) ?></td>
            <td><?= h($transactions->domestic_allowance) ?></td>
            <td><?= h($transactions->housing_allowance) ?></td>
            <td><?= h($transactions->transport_allowance) ?></td>
            <td><?= h($transactions->utility_allowance) ?></td>
            <td><?= h($transactions->living_in_allowance) ?></td>
            <td><?= h($transactions->medical_allowance) ?></td>
            <td><?= h($transactions->entertainment_allowance) ?></td>
            <td><?= h($transactions->leave_allowance) ?></td>
            <td><?= h($transactions->other_allowance) ?></td>
            <td><?= h($transactions->gross) ?></td>
            <td><?= h($transactions->paye) ?></td>
            <td><?= h($transactions->whl_cics) ?></td>
            <td><?= h($transactions->pension_deduction) ?></td>
            <td><?= h($transactions->other_deduction) ?></td>
            <td><?= h($transactions->total_deduction) ?></td>
            <td><?= h($transactions->net_pay) ?></td>
            <td><?= h($transactions->salary_advance) ?></td>
            <td><?= h($transactions->drivers_allowance) ?></td>
            <td><?= h($transactions->bar_account) ?></td>
            <td><?= h($transactions->union_due) ?></td>
            <td><?= h($transactions->tax_amount) ?></td>
            <td><?= h($transactions->arrears) ?></td>
            <td><?= h($transactions->sc_deduction) ?></td>
            <td><?= h($transactions->ileya_xmas_bonus) ?></td>
            <td><?= h($transactions->end_of_year_bonus) ?></td>
            <td><?= h($transactions->service_charge) ?></td>
            <td><?= h($transactions->personal_loan) ?></td>
            <td><?= h($transactions->ctcs) ?></td>
            <td><?= h($transactions->bro_cics) ?></td>
            <td><?= h($transactions->surcharge) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-workDetails view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Work Details') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'WorkDetails' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'WorkDetails' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Organization') ?></th>
          <th><?= __('Department') ?></th>
          <th><?= __('Job Title') ?></th>
          <th><?= __('Job Class') ?></th>
          <th><?= __('Start Date') ?></th>
          <th><?= __('End Date') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($employee->work_details)) { ?>
        <tr>
            <td colspan="11" class="text-muted">
              Work Details record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($employee->work_details as $workDetails) : ?>
        <tr>
            <td><?= h($workDetails->id) ?></td>
            <td><?= h($workDetails->employee_id) ?></td>
            <td><?= h($workDetails->organization) ?></td>
            <td><?= h($workDetails->department) ?></td>
            <td><?= h($workDetails->job_title) ?></td>
            <td><?= h($workDetails->job_class) ?></td>
            <td><?= h($workDetails->start_date) ?></td>
            <td><?= h($workDetails->end_date) ?></td>
            <td><?= h($workDetails->created) ?></td>
            <td><?= h($workDetails->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'WorkDetails', 'action' => 'view', $workDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'WorkDetails', 'action' => 'edit', $workDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkDetails', 'action' => 'delete', $workDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $workDetails->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

