<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NextOfKin $nextOfKin
 */
?>
<?php
$this->assign('title', __('Add Next Of Kin'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Next Of Kins', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($nextOfKin) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('name');
      echo $this->Form->control('relationship_id', ['options' => $relationships]);
      echo $this->Form->control('address');
      echo $this->Form->control('phone');
      echo $this->Form->control('email');
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

