<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoanType $loanType
 */
?>

<?php
$this->assign('title', __('Loan Type'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Loan Types', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($loanType->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($loanType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($loanType->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($loanType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($loanType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($loanType->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $loanType->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $loanType->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loanType->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-loans view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Loans') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Loans' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Loans' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Loan Type Id') ?></th>
          <th><?= __('Principal') ?></th>
          <th><?= __('Tenor') ?></th>
          <th><?= __('Payment Count') ?></th>
          <th><?= __('Rate') ?></th>
          <th><?= __('Interest') ?></th>
          <th><?= __('Total') ?></th>
          <th><?= __('Deduction') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Remark') ?></th>
          <th><?= __('Status Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($loanType->loans)) { ?>
        <tr>
            <td colspan="16" class="text-muted">
              Loans record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($loanType->loans as $loans) : ?>
        <tr>
            <td><?= h($loans->id) ?></td>
            <td><?= h($loans->employee_id) ?></td>
            <td><?= h($loans->loan_type_id) ?></td>
            <td><?= h($loans->principal) ?></td>
            <td><?= h($loans->tenor) ?></td>
            <td><?= h($loans->payment_count) ?></td>
            <td><?= h($loans->rate) ?></td>
            <td><?= h($loans->interest) ?></td>
            <td><?= h($loans->total) ?></td>
            <td><?= h($loans->deduction) ?></td>
            <td><?= h($loans->date) ?></td>
            <td><?= h($loans->remark) ?></td>
            <td><?= h($loans->status_id) ?></td>
            <td><?= h($loans->created) ?></td>
            <td><?= h($loans->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

