<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>

<?php
$this->assign('title', __('Address'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Addresses', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($address->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $address->has('employee') ? $this->Html->link($address->employee->id, ['controller' => 'Employees', 'action' => 'view', $address->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Address Type') ?></th>
            <td><?= $address->has('address_type') ? $this->Html->link($address->address_type->name, ['controller' => 'AddressTypes', 'action' => 'view', $address->address_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($address->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($address->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $address->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Name') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($address->name)); ?>
  </div>
</div>

