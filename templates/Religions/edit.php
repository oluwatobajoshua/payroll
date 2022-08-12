<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Religion $religion
 */
?>
<?php
$this->assign('title', __('Edit Religion'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Religions', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $religion->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($religion) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $religion->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $religion->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

