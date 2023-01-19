<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BiddingDetail $biddingDetail
 */
?>

<?php
$this->assign('title', __('Bidding Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Bidding Details', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($biddingDetail->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Bidding') ?></th>
            <td><?= $biddingDetail->has('bidding') ? $this->Html->link($biddingDetail->bidding->id, ['controller' => 'Biddings', 'action' => 'view', $biddingDetail->bidding->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Asset') ?></th>
            <td><?= $biddingDetail->has('asset') ? $this->Html->link($biddingDetail->asset->id, ['controller' => 'Assets', 'action' => 'view', $biddingDetail->asset->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $biddingDetail->has('status') ? $this->Html->link($biddingDetail->status->name, ['controller' => 'Statuses', 'action' => 'view', $biddingDetail->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Remark') ?></th>
            <td><?= h($biddingDetail->remark) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($biddingDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($biddingDetail->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Qty') ?></th>
            <td><?= $this->Number->format($biddingDetail->approved_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($biddingDetail->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Payable') ?></th>
            <td><?= $this->Number->format($biddingDetail->total_payable) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Payable') ?></th>
            <td><?= $this->Number->format($biddingDetail->approved_payable) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($biddingDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($biddingDetail->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $biddingDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $biddingDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $biddingDetail->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


