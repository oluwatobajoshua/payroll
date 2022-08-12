<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkDetail $workDetail
 */
?>
<?php
$this->assign('title', __('Edit Work Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Work Details', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $workDetail->id]],
    ['title' => 'Edit'],
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
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $workDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $workDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

