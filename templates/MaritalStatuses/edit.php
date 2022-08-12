<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaritalStatus $maritalStatus
 */
?>
<?php
$this->assign('title', __('Edit Marital Status'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Marital Statuses', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $maritalStatus->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($maritalStatus) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $maritalStatus->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $maritalStatus->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

