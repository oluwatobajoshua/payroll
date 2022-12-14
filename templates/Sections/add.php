<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
?>
<?php
$this->assign('title', __('Add Section'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Sections', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($section) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('unit_id', ['options' => $units]);
      echo $this->Form->control('name');
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

