<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidding $bidding
 */
?>

<?php
$this->assign('title', __('Bidding'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Biddings', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($bidding->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $bidding->has('user') ? $this->Html->link($bidding->user->username, ['controller' => 'Users', 'action' => 'view', $bidding->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $bidding->has('status') ? $this->Html->link($bidding->status->name, ['controller' => 'Statuses', 'action' => 'view', $bidding->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bidding->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Asset Qty') ?></th>
            <td><?= $this->Number->format($bidding->asset_qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($bidding->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Amount') ?></th>
            <td><?= $this->Number->format($bidding->approved_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($bidding->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($bidding->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $bidding->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $bidding->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bidding->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-biddingDetails view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Bidding Details') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'BiddingDetails' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'BiddingDetails' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Bidding Id') ?></th>
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
      <?php if (empty($bidding->bidding_details)) { ?>
        <tr>
            <td colspan="13" class="text-muted">
              Bidding Details record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($bidding->bidding_details as $biddingDetails) : ?>
        <tr>
            <td><?= h($biddingDetails->id) ?></td>
            <td><?= h($biddingDetails->bidding_id) ?></td>
            <td><?= h($biddingDetails->asset_id) ?></td>
            <td><?= h($biddingDetails->qty) ?></td>
            <td><?= h($biddingDetails->approved_qty) ?></td>
            <td><?= h($biddingDetails->price) ?></td>
            <td><?= h($biddingDetails->total_payable) ?></td>
            <td><?= h($biddingDetails->approved_payable) ?></td>
            <td><?= h($biddingDetails->status_id) ?></td>
            <td><?= h($biddingDetails->remark) ?></td>
            <td><?= h($biddingDetails->created) ?></td>
            <td><?= h($biddingDetails->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'BiddingDetails', 'action' => 'view', $biddingDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'BiddingDetails', 'action' => 'edit', $biddingDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'BiddingDetails', 'action' => 'delete', $biddingDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $biddingDetails->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

