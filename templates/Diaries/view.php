<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>

<?php
$this->assign('title', __('Diary'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Diaries', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($diary->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($diary->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($diary->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($diary->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Of Party') ?></th>
            <td><?= h($diary->type_of_party) ?></td>
        </tr>
        <tr>
            <th><?= __('Covers') ?></th>
            <td><?= h($diary->covers) ?></td>
        </tr>
        <tr>
            <th><?= __('Drinks') ?></th>
            <td><?= h($diary->drinks) ?></td>
        </tr>
        <tr>
            <th><?= __('Hall') ?></th>
            <td><?= $diary->has('hall') ? $this->Html->link($diary->hall->name, ['controller' => 'Halls', 'action' => 'view', $diary->hall->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $diary->has('status') ? $this->Html->link($diary->status->name, ['controller' => 'Statuses', 'action' => 'view', $diary->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($diary->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Bill') ?></th>
            <td><?= $this->Number->format($diary->total_bill) ?></td>
        </tr>
        <tr>
            <th><?= __('Deposit') ?></th>
            <td><?= $this->Number->format($diary->deposit) ?></td>
        </tr>
        <tr>
            <th><?= __('Balance') ?></th>
            <td><?= $this->Number->format($diary->balance) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($diary->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($diary->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($diary->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $diary->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diary->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Requirements') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($diary->requirements)); ?>
  </div>
</div>
<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Remarks') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($diary->remarks)); ?>
  </div>
</div>

