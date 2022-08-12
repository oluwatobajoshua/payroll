<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChildrenDetail $childrenDetail
 */
?>
<?php
$this->assign('title', __('Add Children Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Children Details', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($childrenDetail) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('name');
      echo $this->Form->control('date_of_birth');
      echo $this->Form->control('gender_id', ['options' => $genders]);
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

