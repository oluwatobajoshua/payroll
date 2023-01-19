<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoanType $loanType
 */
?>
<?php
$this->assign('title', __('Edit Loan Type'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Loan Types', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $loanType->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($loanType) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
      echo $this->Form->control('description');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $loanType->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $loanType->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

