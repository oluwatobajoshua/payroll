<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChildrenDetail $childrenDetail
 */
?>

<?php
$this->assign('title', __('Children Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Children Details', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($childrenDetail->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $childrenDetail->has('employee') ? $this->Html->link($childrenDetail->employee->id, ['controller' => 'Employees', 'action' => 'view', $childrenDetail->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($childrenDetail->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= $childrenDetail->has('gender') ? $this->Html->link($childrenDetail->gender->name, ['controller' => 'Genders', 'action' => 'view', $childrenDetail->gender->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($childrenDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($childrenDetail->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($childrenDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($childrenDetail->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $childrenDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $childrenDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $childrenDetail->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


