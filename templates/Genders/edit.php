<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<?php
$this->assign('title', __('Edit Gender'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Genders', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $gender->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($gender) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $gender->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

