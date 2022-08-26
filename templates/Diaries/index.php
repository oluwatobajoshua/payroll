<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diary[]|\Cake\Collection\CollectionInterface $diaries
 */
?>
<?php
$this->assign('title', __('Diaries'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Diaries'],
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
            <?= $this->Html->link(__('New Diary'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('type_of_party') ?></th>
                    <th><?= $this->Paginator->sort('covers') ?></th>
                    <th><?= $this->Paginator->sort('drinks') ?></th>
                    <th><?= $this->Paginator->sort('hall_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('total_bill') ?></th>
                    <th><?= $this->Paginator->sort('deposit') ?></th>
                    <th><?= $this->Paginator->sort('balance') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diaries as $diary) : ?>
                    <tr>
                        <td><?= $this->Number->format($diary->id) ?></td>
                        <td><?= h($diary->name) ?></td>
                        <td><?= h($diary->address) ?></td>
                        <td><?= h($diary->phone) ?></td>
                        <td><?= h($diary->type_of_party) ?></td>
                        <td><?= h($diary->covers) ?></td>
                        <td><?= h($diary->drinks) ?></td>
                        <td><?= $diary->has('hall') ? $this->Html->link($diary->hall->name, ['controller' => 'Halls', 'action' => 'view', $diary->hall->id]) : '' ?></td>
                        <td><?= h($diary->date) ?></td>
                        <td><?= $this->Number->format($diary->total_bill) ?></td>
                        <td><?= $this->Number->format($diary->deposit) ?></td>
                        <td><?= $this->Number->format($diary->balance) ?></td>
                        <td><?= $diary->has('status') ? $this->Html->link($diary->status->name, ['controller' => 'Statuses', 'action' => 'view', $diary->status->id]) : '' ?></td>
                        <td><?= h($diary->created) ?></td>
                        <td><?= h($diary->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $diary->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diary->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diary->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]) ?>
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
