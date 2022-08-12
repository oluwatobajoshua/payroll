<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>

<?php
$this->assign('title', __('Leave'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Leaves', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($leave->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $leave->has('employee') ? $this->Html->link($leave->employee->id, ['controller' => 'Employees', 'action' => 'view', $leave->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $leave->has('status') ? $this->Html->link($leave->status->name, ['controller' => 'Statuses', 'action' => 'view', $leave->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($leave->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Days Entitled') ?></th>
            <td><?= $this->Number->format($leave->days_entitled) ?></td>
        </tr>
        <tr>
            <th><?= __('Previous Outstanding') ?></th>
            <td><?= $this->Number->format($leave->previous_outstanding) ?></td>
        </tr>
        <tr>
            <th><?= __('Days Requested') ?></th>
            <td><?= $this->Number->format($leave->days_requested) ?></td>
        </tr>
        <tr>
            <th><?= __('Outstanding Days') ?></th>
            <td><?= $this->Number->format($leave->outstanding_days) ?></td>
        </tr>
        <tr>
            <th><?= __('Staff Signature') ?></th>
            <td><?= $this->Number->format($leave->staff_signature) ?></td>
        </tr>
        <tr>
            <th><?= __('Relieving Officer') ?></th>
            <td><?= $this->Number->format($leave->relieving_officer) ?></td>
        </tr>
        <tr>
            <th><?= __('Hou Comments') ?></th>
            <td><?= $this->Number->format($leave->hou_comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Hod Comments') ?></th>
            <td><?= $this->Number->format($leave->hod_comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Hrm Comments') ?></th>
            <td><?= $this->Number->format($leave->hrm_comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Md Comments') ?></th>
            <td><?= $this->Number->format($leave->md_comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Commencement Date') ?></th>
            <td><?= h($leave->commencement_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($leave->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($leave->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $leave->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


