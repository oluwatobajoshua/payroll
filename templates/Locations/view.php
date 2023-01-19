<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>

<?php
$this->assign('title', __('Location'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Locations', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($location->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $location->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $location->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-assets view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Assets') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Assets' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Assets' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Code') ?></th>
          <th><?= __('Item') ?></th>
          <th><?= __('Model') ?></th>
          <th><?= __('Date Of Purchase') ?></th>
          <th><?= __('Qty Available') ?></th>
          <th><?= __('Qty Bidded') ?></th>
          <th><?= __('Qty Left') ?></th>
          <th><?= __('Reserved Price') ?></th>
          <th><?= __('Location Id') ?></th>
          <th><?= __('Status Id') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($location->assets)) { ?>
        <tr>
            <td colspan="12" class="text-muted">
              Assets record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($location->assets as $assets) : ?>
        <tr>
            <td><?= h($assets->id) ?></td>
            <td><?= h($assets->code) ?></td>
            <td><?= h($assets->item) ?></td>
            <td><?= h($assets->model) ?></td>
            <td><?= h($assets->date_of_purchase) ?></td>
            <td><?= h($assets->qty_available) ?></td>
            <td><?= h($assets->qty_bidded) ?></td>
            <td><?= h($assets->qty_left) ?></td>
            <td><?= h($assets->reserved_price) ?></td>
            <td><?= h($assets->location_id) ?></td>
            <td><?= h($assets->status_id) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Assets', 'action' => 'view', $assets->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Assets', 'action' => 'edit', $assets->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assets', 'action' => 'delete', $assets->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $assets->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

