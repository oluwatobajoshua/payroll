<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Education $education
 */
?>
<?php
$this->assign('title', __('Add Education'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Educations', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($education) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('institution');
      echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
      echo $this->Form->control('course_of_study');
      echo $this->Form->control('date');
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

