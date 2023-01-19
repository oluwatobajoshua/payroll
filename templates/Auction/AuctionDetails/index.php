<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuctionDetail[]|\Cake\Collection\CollectionInterface $auctionDetails
 */
?>
<?php
$this->assign('title', __('Auction Details'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Auction Details'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <?= $this->Html->link(__('New Auction Detail'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('auction_id') ?></th>
                    <th><?= $this->Paginator->sort('asset_id') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('approved_qty') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('total_payable') ?></th>
                    <th><?= $this->Paginator->sort('approved_payable') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('remark') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($auctionDetails as $auctionDetail) : ?>
                    <tr>
                        <td><?= $this->Number->format($auctionDetail->id) ?></td>
                        <td><?= $auctionDetail->has('auction') ? $this->Html->link($auctionDetail->auction->id, ['controller' => 'Auctions', 'action' => 'view', $auctionDetail->auction->id]) : '' ?></td>
                        <td><?= $auctionDetail->has('asset') ? $this->Html->link($auctionDetail->asset->id, ['controller' => 'Assets', 'action' => 'view', $auctionDetail->asset->id]) : '' ?></td>
                        <td><?= $this->Number->format($auctionDetail->qty) ?></td>
                        <td><?= $this->Number->format($auctionDetail->approved_qty) ?></td>
                        <td><?= $this->Number->format($auctionDetail->price) ?></td>
                        <td><?= $this->Number->format($auctionDetail->total_payable) ?></td>
                        <td><?= $this->Number->format($auctionDetail->approved_payable) ?></td>
                        <td><?= $auctionDetail->has('status') ? $this->Html->link($auctionDetail->status->name, ['controller' => 'Statuses', 'action' => 'view', $auctionDetail->status->id]) : '' ?></td>
                        <td><?= h($auctionDetail->remark) ?></td>
                        <td><?= h($auctionDetail->created) ?></td>
                        <td><?= h($auctionDetail->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $auctionDetail->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auctionDetail->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auctionDetail->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $auctionDetail->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-md-flex paginator">
        <div class="mr-auto" style="font-size:.8rem">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>
