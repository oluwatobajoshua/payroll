<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $asset
 */
?>
<?php
$this->assign('title', __('Edit Asset'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Assets', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $asset->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($asset) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('code');
      echo $this->Form->control('item');
      echo $this->Form->control('model');
      echo $this->Form->control('date_of_purchase');
      echo $this->Form->control('qty_available');
      echo $this->Form->control('qty_bidded');
      echo $this->Form->control('qty_left');
      echo $this->Form->control('reserved_price');
      echo $this->Form->control('location_id', ['options' => $locations, 'empty' => true]);
      echo $this->Form->control('status_id', ['options' => $statuses, 'empty' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $asset->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $asset->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

