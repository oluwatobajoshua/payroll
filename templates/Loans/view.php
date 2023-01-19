<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>

<?php
$this->assign('title', __('Loan'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Loans', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($loan->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $loan->has('employee') ? $this->Html->link($loan->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $loan->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $loan->has('status') ? $this->Html->link($loan->status->name, ['controller' => 'Statuses', 'action' => 'view', $loan->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($loan->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Principal') ?></th>
            <td><?= $this->Number->format($loan->principal) ?></td>
        </tr>
        <tr>
            <th><?= __('Tenor') ?></th>
            <td><?= $this->Number->format($loan->tenor) ?></td>
        </tr>
        <tr>
            <th><?= __('Rate') ?></th>
            <td><?= $this->Number->format($loan->rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Interest') ?></th>
            <td><?= $this->Number->format($loan->interest) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($loan->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Deduction') ?></th>
            <td><?= $this->Number->format($loan->deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($loan->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($loan->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($loan->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $loan->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Remark') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($loan->remark)); ?>
  </div>
</div>

