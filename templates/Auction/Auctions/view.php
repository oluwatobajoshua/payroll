<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Auction $auction
 */
?>

<?php
$this->assign('title', __('Auction'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Auctions', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($auction->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $auction->has('user') ? $this->Html->link($auction->user->id, ['controller' => 'Users', 'action' => 'view', $auction->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $auction->has('status') ? $this->Html->link($auction->status->name, ['controller' => 'Statuses', 'action' => 'view', $auction->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($auction->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Asset Qty') ?></th>
            <td><?= $this->Number->format($auction->asset_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($auction->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Amount') ?></th>
            <td><?= $this->Number->format($auction->approved_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($auction->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($auction->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $auction->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $auction->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auction->id], ['class' => 'btn btn-secondary']) ?>
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
      <?php if (empty($auction->auction_details)) { ?>
        <tr>
            <td colspan="13" class="text-muted">
              Auction Details record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($auction->auction_details as $auctionDetails) : ?>
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

