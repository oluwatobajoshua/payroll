<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceCharge $serviceCharge
 */
?>
<?php
$this->assign('title', __('Edit Service Charge'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Service Charges', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $serviceCharge->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($serviceCharge) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('grade_id', ['options' => $grades]);
      echo $this->Form->control('amount');
      echo $this->Form->control('ileya_xmas_bonus');
      echo $this->Form->control('end_of_year_bonus');
      echo $this->Form->control('njic_arrears');
      echo $this->Form->control('company_id', ['options' => $companies]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $serviceCharge->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCharge->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

