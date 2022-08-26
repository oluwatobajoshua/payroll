<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
// debug($employeed)
?>
<?php
$this->assign('title', __('Add Transaction',['id' => 'add-transaction']));
$this->Breadcrumbs->add([
  ['title' => 'Home', 'url' => '/'],
  ['title' => 'List Transactions', 'url' => ['action' => 'index']],
  ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <div class="box-header with-border">
    <div class="col-12">
      <div class="callout callout-info">
        <?= $this->Form->create(null, ['id' => 'empForm']) ?>
        <div class="row">
          <?php
          $this->Form->setTemplates([
            'inputContainer' => '<div class="form-group input col-md-6 col-xs-6 {{type}} {{required}}">{{content}}</div>'
          ]);
          echo $this->Form->control('emp', ['label' => 'Employees', 'options' => $employees, 'value' => $transaction->employee_id, 'title' => 'Select an employee to add transaction', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
          ?>
          <?= $this->Form->end() ?>
        </div>
      </div><!-- /.col -->
    </div>
    <?= $this->Form->create($transaction,['id'=>'transactions']) ?>
    <div class="card-body">
      <div class="row">
        <?php
        $this->Form->setTemplates([
          'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
        ]);
        echo $this->Form->control('employee_id', ['readonly' => true]);
        echo $this->Form->control('date', ['type' => 'date', 'readonly' => true]);
        echo $this->Form->control('basic_salary');
        echo $this->Form->control('transport_allowance');
        echo $this->Form->control('housing_allowance');
        echo $this->Form->control('utility_allowance');
        echo $this->Form->control('union_due');
        echo $this->Form->control('pension_deduction');
        echo $this->Form->control('paye', ['label' => 'Tax Amount']);
        echo $this->Form->control('domestic_allowance');
        echo $this->Form->control('living_in_allowance');
        echo $this->Form->control('medical_allowance');
        echo $this->Form->control('entertainment_allowance');
        echo $this->Form->control('other_allowance');
        echo $this->Form->control('ctcs');
        echo $this->Form->control('salary_advance');
        echo $this->Form->control('drivers_allowance');
        echo $this->Form->control('bar_account');
        echo $this->Form->control('arrears');
        echo $this->Form->control('sc_deduction');
        echo $this->Form->control('ileya_xmas_bonus');
        echo $this->Form->control('end_of_year_bonus');
        echo $this->Form->control('leave_allowance');
        echo $this->Form->control('personal_loan');
        echo $this->Form->control('surcharge');
        echo $this->Form->control('other_deduction');
        ?>
      </div>
    </div>

    <div class="card-footer d-flex">
      <div class="ml-auto">
        <?= $this->Form->button(__('Save')) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
      </div>
    </div>
    <?= $this->Form->end() ?>
  </div>