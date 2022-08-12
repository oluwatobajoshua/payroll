<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChildrenDetail $childrenDetail
 */
?>
<?php
$this->assign('title', __('Edit Children Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Children Details', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $childrenDetail->id]],
    ['title' => 'Edit'],
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
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $childrenDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $childrenDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

