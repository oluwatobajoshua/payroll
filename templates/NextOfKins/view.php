<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NextOfKin $nextOfKin
 */
?>

<?php
$this->assign('title', __('Next Of Kin'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Next Of Kins', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($nextOfKin->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $nextOfKin->has('employee') ? $this->Html->link($nextOfKin->employee->id, ['controller' => 'Employees', 'action' => 'view', $nextOfKin->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($nextOfKin->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Relationship') ?></th>
            <td><?= $nextOfKin->has('relationship') ? $this->Html->link($nextOfKin->relationship->name, ['controller' => 'Relationships', 'action' => 'view', $nextOfKin->relationship->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($nextOfKin->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($nextOfKin->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($nextOfKin->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($nextOfKin->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($nextOfKin->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($nextOfKin->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $nextOfKin->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $nextOfKin->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nextOfKin->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


