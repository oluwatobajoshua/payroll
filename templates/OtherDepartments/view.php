<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OtherDepartment $otherDepartment
 */
?>

<?php
$this->assign('title', __('Other Department'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Other Departments', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($otherDepartment->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $otherDepartment->has('employee') ? $this->Html->link($otherDepartment->employee->id, ['controller' => 'Employees', 'action' => 'view', $otherDepartment->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Section') ?></th>
            <td><?= $otherDepartment->has('section') ? $this->Html->link($otherDepartment->section->name, ['controller' => 'Sections', 'action' => 'view', $otherDepartment->section->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Comment') ?></th>
            <td><?= h($otherDepartment->comment) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($otherDepartment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($otherDepartment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($otherDepartment->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $otherDepartment->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $otherDepartment->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $otherDepartment->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


