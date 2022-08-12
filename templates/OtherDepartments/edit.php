<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OtherDepartment $otherDepartment
 */
?>
<?php
$this->assign('title', __('Edit Other Department'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Other Departments', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $otherDepartment->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($otherDepartment) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
      echo $this->Form->control('comment');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $otherDepartment->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $otherDepartment->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

