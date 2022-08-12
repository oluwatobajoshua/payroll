<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<?php
$this->assign('title', __('Add Transaction'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Transactions', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($transaction) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('company_id', ['options' => $companies]);
      echo $this->Form->control('date');
      echo $this->Form->control('basic_salary');
      echo $this->Form->control('domestic_allowance');
      echo $this->Form->control('housing_allowance');
      echo $this->Form->control('transport_allowance');
      echo $this->Form->control('utility_allowance');
      echo $this->Form->control('living_in_allowance');
      echo $this->Form->control('medical_allowance');
      echo $this->Form->control('entertainment_allowance');
      echo $this->Form->control('leave_allowance');
      echo $this->Form->control('other_allowance');
      echo $this->Form->control('gross');
      echo $this->Form->control('paye');
      echo $this->Form->control('whl_cics');
      echo $this->Form->control('pension_deduction');
      echo $this->Form->control('other_deduction');
      echo $this->Form->control('total_deduction');
      echo $this->Form->control('net_pay');
      echo $this->Form->control('salary_advance');
      echo $this->Form->control('drivers_allowance');
      echo $this->Form->control('bar_account');
      echo $this->Form->control('union_due');
      echo $this->Form->control('tax_amount');
      echo $this->Form->control('arrears');
      echo $this->Form->control('sc_deduction');
      echo $this->Form->control('ileya_xmas_bonus');
      echo $this->Form->control('end_of_year_bonus');
      echo $this->Form->control('service_charge');
      echo $this->Form->control('personal_loan');
      echo $this->Form->control('ctcs');
      echo $this->Form->control('bro_cics');
      echo $this->Form->control('surcharge');
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

