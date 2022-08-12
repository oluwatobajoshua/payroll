<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<?php
$this->assign('title', __('Edit State'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List States', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $state->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($state) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $state->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $state->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

