<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<?php
$this->assign('title', __('Add Address'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Addresses', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($address) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('name');
      echo $this->Form->control('address_type_id', ['options' => $addressTypes]);
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

