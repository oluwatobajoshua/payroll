<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary $diary
 */
?>
<?php
$this->assign('title', __('Add Diary'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Diaries', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($diary) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
      echo $this->Form->control('address');
      echo $this->Form->control('phone');
      echo $this->Form->control('type_of_party');
      echo $this->Form->control('covers');
      echo $this->Form->control('drinks');
      echo $this->Form->control('hall_id', ['options' => $halls]);
      echo $this->Form->control('date');
      echo $this->Form->control('requirements');
      echo $this->Form->control('total_bill');
      echo $this->Form->control('deposit');
      echo $this->Form->control('balance');
      echo $this->Form->control('remarks');
      echo $this->Form->control('status_id', ['options' => $statuses]);
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

