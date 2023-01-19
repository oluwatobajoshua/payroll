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
            <th><?= __('Physical Posture') ?></th>
            <td><?= $employee->has('physical_posture') ? $this->Html->link($employee->physical_posture->name, ['controller' => 'PhysicalPostures', 'action' => 'view', $employee->physical_posture->id]) : '' ?></td>
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
