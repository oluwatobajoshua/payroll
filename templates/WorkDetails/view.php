<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkDetail $workDetail
 */
?>

<?php
$this->assign('title', __('Work Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Work Details', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($workDetail->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $workDetail->has('employee') ? $this->Html->link($workDetail->employee->id, ['controller' => 'Employees', 'action' => 'view', $workDetail->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Organization') ?></th>
            <td><?= h($workDetail->organization) ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($workDetail->department) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Title') ?></th>
            <td><?= h($workDetail->job_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Class') ?></th>
            <td><?= h($workDetail->job_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($workDetail->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($workDetail->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($workDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($workDetail->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $workDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $workDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workDetail->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


