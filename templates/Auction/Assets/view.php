<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asset $asset
 */
?>

<?php
$this->assign('title', __('Asset'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Assets', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($asset->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($asset->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= h($asset->item) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($asset->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Purchase') ?></th>
            <td><?= h($asset->date_of_purchase) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $asset->has('location') ? $this->Html->link($asset->location->name, ['controller' => 'Locations', 'action' => 'view', $asset->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $asset->has('status') ? $this->Html->link($asset->status->name, ['controller' => 'Statuses', 'action' => 'view', $asset->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($asset->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty Available') ?></th>
            <td><?= $this->Number->format($asset->qty_available) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty Bidded') ?></th>
            <td><?= $this->Number->format($asset->qty_bidded) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty Left') ?></th>
            <td><?= $this->Number->format($asset->qty_left) ?></td>
        </tr>
        <tr>
            <th><?= __('Reserved Price') ?></th>
            <td><?= $this->Number->format($asset->reserved_price) ?></td>
        </tr>
    </table>
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
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asset->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-auctionDetails view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Auction Details') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'AuctionDetails' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'AuctionDetails' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Auction Id') ?></th>
          <th><?= __('Asset Id') ?></th>
          <th><?= __('Qty') ?></th>
          <th><?= __('Approved Qty') ?></th>
          <th><?= __('Price') ?></th>
          <th><?= __('Total Payable') ?></th>
          <th><?= __('Approved Payable') ?></th>
          <th><?= __('Status Id') ?></th>
          <th><?= __('Remark') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($asset->auction_details)) { ?>
        <tr>
            <td colspan="13" class="text-muted">
              Auction Details record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($asset->auction_details as $auctionDetails) : ?>
        <tr>
            <td><?= h($auctionDetails->id) ?></td>
            <td><?= h($auctionDetails->auction_id) ?></td>
            <td><?= h($auctionDetails->asset_id) ?></td>
            <td><?= h($auctionDetails->qty) ?></td>
            <td><?= h($auctionDetails->approved_qty) ?></td>
            <td><?= h($auctionDetails->price) ?></td>
            <td><?= h($auctionDetails->total_payable) ?></td>
            <td><?= h($auctionDetails->approved_payable) ?></td>
            <td><?= h($auctionDetails->status_id) ?></td>
            <td><?= h($auctionDetails->remark) ?></td>
            <td><?= h($auctionDetails->created) ?></td>
            <td><?= h($auctionDetails->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'AuctionDetails', 'action' => 'view', $auctionDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'AuctionDetails', 'action' => 'edit', $auctionDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuctionDetails', 'action' => 'delete', $auctionDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $auctionDetails->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

