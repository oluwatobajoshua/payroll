<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<?php
$this->assign('title', __('Add Company'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Companies', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($company) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('rc');
      echo $this->Form->control('address');
      echo $this->Form->control('union_due');
      echo $this->Form->control('company_leave');
      echo $this->Form->control('date');
      echo $this->Form->control('employee_id', ['options' => $employees]);
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

