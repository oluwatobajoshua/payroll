<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>

<?php
$this->assign('title', __('Transaction'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Transactions', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($transaction->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $transaction->has('employee') ? $this->Html->link($transaction->employee->id, ['controller' => 'Employees', 'action' => 'view', $transaction->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $transaction->has('company') ? $this->Html->link($transaction->company->name, ['controller' => 'Companies', 'action' => 'view', $transaction->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Basic Salary') ?></th>
            <td><?= $this->Number->format($transaction->basic_salary) ?></td>
        </tr>
        <tr>
            <th><?= __('Domestic Allowance') ?></th>
            <td><?= $this->Number->format($transaction->domestic_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Housing Allowance') ?></th>
            <td><?= $this->Number->format($transaction->housing_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Transport Allowance') ?></th>
            <td><?= $this->Number->format($transaction->transport_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Utility Allowance') ?></th>
            <td><?= $this->Number->format($transaction->utility_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Living In Allowance') ?></th>
            <td><?= $this->Number->format($transaction->living_in_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Medical Allowance') ?></th>
            <td><?= $this->Number->format($transaction->medical_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Entertainment Allowance') ?></th>
            <td><?= $this->Number->format($transaction->entertainment_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Allowance') ?></th>
            <td><?= $this->Number->format($transaction->leave_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Allowance') ?></th>
            <td><?= $this->Number->format($transaction->other_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Gross') ?></th>
            <td><?= $this->Number->format($transaction->gross) ?></td>
        </tr>
        <tr>
            <th><?= __('Paye') ?></th>
            <td><?= $this->Number->format($transaction->paye) ?></td>
        </tr>
        <tr>
            <th><?= __('Whl Cics') ?></th>
            <td><?= $this->Number->format($transaction->whl_cics) ?></td>
        </tr>
        <tr>
            <th><?= __('Pension Deduction') ?></th>
            <td><?= $this->Number->format($transaction->pension_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Deduction') ?></th>
            <td><?= $this->Number->format($transaction->other_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Deduction') ?></th>
            <td><?= $this->Number->format($transaction->total_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Net Pay') ?></th>
            <td><?= $this->Number->format($transaction->net_pay) ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Advance') ?></th>
            <td><?= $this->Number->format($transaction->salary_advance) ?></td>
        </tr>
        <tr>
            <th><?= __('Drivers Allowance') ?></th>
            <td><?= $this->Number->format($transaction->drivers_allowance) ?></td>
        </tr>
        <tr>
            <th><?= __('Bar Account') ?></th>
            <td><?= $this->Number->format($transaction->bar_account) ?></td>
        </tr>
        <tr>
            <th><?= __('Union Due') ?></th>
            <td><?= $this->Number->format($transaction->union_due) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Amount') ?></th>
            <td><?= $this->Number->format($transaction->tax_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Arrears') ?></th>
            <td><?= $this->Number->format($transaction->arrears) ?></td>
        </tr>
        <tr>
            <th><?= __('Sc Deduction') ?></th>
            <td><?= $this->Number->format($transaction->sc_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Ileya Xmas Bonus') ?></th>
            <td><?= $this->Number->format($transaction->ileya_xmas_bonus) ?></td>
        </tr>
        <tr>
            <th><?= __('End Of Year Bonus') ?></th>
            <td><?= $this->Number->format($transaction->end_of_year_bonus) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Charge') ?></th>
            <td><?= $this->Number->format($transaction->service_charge) ?></td>
        </tr>
        <tr>
            <th><?= __('Personal Loan') ?></th>
            <td><?= $this->Number->format($transaction->personal_loan) ?></td>
        </tr>
        <tr>
            <th><?= __('Ctcs') ?></th>
            <td><?= $this->Number->format($transaction->ctcs) ?></td>
        </tr>
        <tr>
            <th><?= __('Bro Cics') ?></th>
            <td><?= $this->Number->format($transaction->bro_cics) ?></td>
        </tr>
        <tr>
            <th><?= __('Surcharge') ?></th>
            <td><?= $this->Number->format($transaction->surcharge) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($transaction->date) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $transaction->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


