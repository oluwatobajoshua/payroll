<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave[]|\Cake\Collection\CollectionInterface $leaves
 */
?>
<?php
$this->assign('title', __('Leaves'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Leaves'],
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
            <?= $this->Html->link(__('New Leave'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('days_entitled') ?></th>
                    <th><?= $this->Paginator->sort('previous_outstanding') ?></th>
                    <th><?= $this->Paginator->sort('days_requested') ?></th>
                    <th><?= $this->Paginator->sort('outstanding_days') ?></th>
                    <th><?= $this->Paginator->sort('commencement_date') ?></th>
                    <th><?= $this->Paginator->sort('staff_signature') ?></th>
                    <th><?= $this->Paginator->sort('relieving_officer') ?></th>
                    <th><?= $this->Paginator->sort('hou_comments') ?></th>
                    <th><?= $this->Paginator->sort('hod_comments') ?></th>
                    <th><?= $this->Paginator->sort('hrm_comments') ?></th>
                    <th><?= $this->Paginator->sort('md_comments') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaves as $leave) : ?>
                    <tr>
                        <td><?= $this->Number->format($leave->id) ?></td>
                        <td><?= $leave->has('employee') ? $this->Html->link($leave->employee->id, ['controller' => 'Employees', 'action' => 'view', $leave->employee->id]) : '' ?></td>
                        <td><?= $this->Number->format($leave->days_entitled) ?></td>
                        <td><?= $this->Number->format($leave->previous_outstanding) ?></td>
                        <td><?= $this->Number->format($leave->days_requested) ?></td>
                        <td><?= $this->Number->format($leave->outstanding_days) ?></td>
                        <td><?= h($leave->commencement_date) ?></td>
                        <td><?= $this->Number->format($leave->staff_signature) ?></td>
                        <td><?= $this->Number->format($leave->relieving_officer) ?></td>
                        <td><?= $this->Number->format($leave->hou_comments) ?></td>
                        <td><?= $this->Number->format($leave->hod_comments) ?></td>
                        <td><?= $this->Number->format($leave->hrm_comments) ?></td>
                        <td><?= $this->Number->format($leave->md_comments) ?></td>
                        <td><?= $leave->has('status') ? $this->Html->link($leave->status->name, ['controller' => 'Statuses', 'action' => 'view', $leave->status->id]) : '' ?></td>
                        <td><?= h($leave->created) ?></td>
                        <td><?= h($leave->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $leave->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leave->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?>
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
