<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>

<?php
$this->assign('title', __('Company'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Companies', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($company->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Rc') ?></th>
            <td><?= h($company->rc) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($company->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $company->has('employee') ? $this->Html->link($company->employee->id, ['controller' => 'Employees', 'action' => 'view', $company->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Union Due') ?></th>
            <td><?= $this->Number->format($company->union_due) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Leave') ?></th>
            <td><?= $this->Number->format($company->company_leave) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($company->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $company->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $company->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-branches view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Branches') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Branches' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Branches' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Company Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($company->branches)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Branches record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($company->branches as $branches) : ?>
        <tr>
            <td><?= h($branches->id) ?></td>
            <td><?= h($branches->name) ?></td>
            <td><?= h($branches->address) ?></td>
            <td><?= h($branches->company_id) ?></td>
            <td><?= h($branches->created) ?></td>
            <td><?= h($branches->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Branches', 'action' => 'view', $branches->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Branches', 'action' => 'edit', $branches->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Branches', 'action' => 'delete', $branches->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $branches->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-serviceCharges view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Service Charges') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'ServiceCharges' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'ServiceCharges' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Grade Id') ?></th>
          <th><?= __('Amount') ?></th>
          <th><?= __('Ileya Xmas Bonus') ?></th>
          <th><?= __('End Of Year Bonus') ?></th>
          <th><?= __('Njic Arrears') ?></th>
          <th><?= __('Company Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($company->service_charges)) { ?>
        <tr>
            <td colspan="10" class="text-muted">
              Service Charges record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($company->service_charges as $serviceCharges) : ?>
        <tr>
            <td><?= h($serviceCharges->id) ?></td>
            <td><?= h($serviceCharges->grade_id) ?></td>
            <td><?= h($serviceCharges->amount) ?></td>
            <td><?= h($serviceCharges->ileya_xmas_bonus) ?></td>
            <td><?= h($serviceCharges->end_of_year_bonus) ?></td>
            <td><?= h($serviceCharges->njic_arrears) ?></td>
            <td><?= h($serviceCharges->company_id) ?></td>
            <td><?= h($serviceCharges->created) ?></td>
            <td><?= h($serviceCharges->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'ServiceCharges', 'action' => 'view', $serviceCharges->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceCharges', 'action' => 'edit', $serviceCharges->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceCharges', 'action' => 'delete', $serviceCharges->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $serviceCharges->id)]) ?>
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
      <?php if (empty($company->transactions)) { ?>
        <tr>
            <td colspan="36" class="text-muted">
              Transactions record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($company->transactions as $transactions) : ?>
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

