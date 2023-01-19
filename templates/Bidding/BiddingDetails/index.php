<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BiddingDetail[]|\Cake\Collection\CollectionInterface $biddingDetails
 */
?>
<?php
$this->assign('title', __('Bidding Details'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Bidding Details'],
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
            <?= $this->Html->link(__('New Bidding Detail'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bidding_id') ?></th>
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
                <?php foreach ($biddingDetails as $biddingDetail) : ?>
                    <tr>
                        <td><?= $this->Number->format($biddingDetail->id) ?></td>
                        <td><?= $biddingDetail->has('bidding') ? $this->Html->link($biddingDetail->bidding->id, ['controller' => 'Biddings', 'action' => 'view', $biddingDetail->bidding->id]) : '' ?></td>
                        <td><?= $biddingDetail->has('asset') ? $this->Html->link($biddingDetail->asset->id, ['controller' => 'Assets', 'action' => 'view', $biddingDetail->asset->id]) : '' ?></td>
                        <td><?= $this->Number->format($biddingDetail->qty) ?></td>
                        <td><?= $this->Number->format($biddingDetail->approved_qty) ?></td>
                        <td><?= $this->Number->format($biddingDetail->price) ?></td>
                        <td><?= $this->Number->format($biddingDetail->total_payable) ?></td>
                        <td><?= $this->Number->format($biddingDetail->approved_payable) ?></td>
                        <td><?= $biddingDetail->has('status') ? $this->Html->link($biddingDetail->status->name, ['controller' => 'Statuses', 'action' => 'view', $biddingDetail->status->id]) : '' ?></td>
                        <td><?= h($biddingDetail->remark) ?></td>
                        <td><?= h($biddingDetail->created) ?></td>
                        <td><?= h($biddingDetail->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $biddingDetail->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $biddingDetail->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $biddingDetail->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $biddingDetail->id)]) ?>
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
