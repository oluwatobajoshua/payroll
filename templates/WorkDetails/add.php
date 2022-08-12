<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkDetail $workDetail
 */
?>
<?php
$this->assign('title', __('Add Work Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Work Details', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($workDetail) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('organization');
      echo $this->Form->control('department');
      echo $this->Form->control('job_title');
      echo $this->Form->control('job_class');
      echo $this->Form->control('start_date');
      echo $this->Form->control('end_date');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

