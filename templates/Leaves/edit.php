<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<?php
$this->assign('title', __('Edit Leave'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Leaves', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $leave->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($leave) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('days_entitled');
      echo $this->Form->control('previous_outstanding');
      echo $this->Form->control('days_requested');
      echo $this->Form->control('outstanding_days');
      echo $this->Form->control('commencement_date');
      echo $this->Form->control('staff_signature');
      echo $this->Form->control('relieving_officer');
      echo $this->Form->control('hou_comments');
      echo $this->Form->control('hod_comments');
      echo $this->Form->control('hrm_comments');
      echo $this->Form->control('md_comments');
      echo $this->Form->control('status_id', ['options' => $statuses]);
    ?>
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
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

