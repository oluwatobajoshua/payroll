<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade $grade
 */
?>
<?php
$this->assign('title', __('Edit Grade'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Grades', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $grade->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($grade) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('user_id', ['options' => $users]);
      echo $this->Form->control('name');
      echo $this->Form->control('description');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $grade->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

