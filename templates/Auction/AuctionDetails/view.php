<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuctionDetail $auctionDetail
 */
?>

<?php
$this->assign('title', __('Auction Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Auction Details', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($auctionDetail->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Auction') ?></th>
            <td><?= $auctionDetail->has('auction') ? $this->Html->link($auctionDetail->auction->id, ['controller' => 'Auctions', 'action' => 'view', $auctionDetail->auction->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Asset') ?></th>
            <td><?= $auctionDetail->has('asset') ? $this->Html->link($auctionDetail->asset->id, ['controller' => 'Assets', 'action' => 'view', $auctionDetail->asset->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $auctionDetail->has('status') ? $this->Html->link($auctionDetail->status->name, ['controller' => 'Statuses', 'action' => 'view', $auctionDetail->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Remark') ?></th>
            <td><?= h($auctionDetail->remark) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($auctionDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($auctionDetail->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Qty') ?></th>
            <td><?= $this->Number->format($auctionDetail->approved_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($auctionDetail->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Payable') ?></th>
            <td><?= $this->Number->format($auctionDetail->total_payable) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Payable') ?></th>
            <td><?= $this->Number->format($auctionDetail->approved_payable) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($auctionDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($auctionDetail->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $auctionDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $auctionDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auctionDetail->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


