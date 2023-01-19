<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asset[]|\Cake\Collection\CollectionInterface $assets
 */
?>
<?php
$this->assign('title', __('Assets'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Assets'],
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
            <?= $this->Html->link(__('New Asset'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('item') ?></th>
                    <th><?= $this->Paginator->sort('model') ?></th>
                    <th><?= $this->Paginator->sort('date_of_purchase') ?></th>
                    <th><?= $this->Paginator->sort('qty_available') ?></th>
                    <th><?= $this->Paginator->sort('qty_bidded') ?></th>
                    <th><?= $this->Paginator->sort('qty_left') ?></th>
                    <th><?= $this->Paginator->sort('reserved_price') ?></th>
                    <th><?= $this->Paginator->sort('location_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assets as $asset) : ?>
                    <tr>
                        <td><?= $this->Number->format($asset->id) ?></td>
                        <td><?= h($asset->code) ?></td>
                        <td><?= h($asset->item) ?></td>
                        <td><?= h($asset->model) ?></td>
                        <td><?= h($asset->date_of_purchase) ?></td>
                        <td><?= $this->Number->format($asset->qty_available) ?></td>
                        <td><?= $this->Number->format($asset->qty_bidded) ?></td>
                        <td><?= $this->Number->format($asset->qty_left) ?></td>
                        <td><?= $this->Number->format($asset->reserved_price) ?></td>
                        <td><?= $asset->has('location') ? $this->Html->link($asset->location->name, ['controller' => 'Locations', 'action' => 'view', $asset->location->id]) : '' ?></td>
                        <td><?= $asset->has('status') ? $this->Html->link($asset->status->name, ['controller' => 'Statuses', 'action' => 'view', $asset->status->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $asset->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asset->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asset->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $asset->id)]) ?>
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
