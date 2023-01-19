<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan[]|\Cake\Collection\CollectionInterface $loans
 */
?>
<?php
$this->assign('title', __('Loans'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Loans'],
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
            <?= $this->Html->link(__('New Loan'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('principal') ?></th>
                    <th><?= $this->Paginator->sort('loan_type_id') ?></th>
                    <th><?= $this->Paginator->sort('tenor') ?></th>
                    <th><?= $this->Paginator->sort('payment_count',['label' =>'Pay Count']) ?></th>
                    <th><?= $this->Paginator->sort('rate') ?></th>
                    <th><?= $this->Paginator->sort('interest') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('deduction') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created') ?></th> -->
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan) : ?>
                    <tr>
                        <td><?= $this->Number->format($loan->id) ?></td>
                        <td><?= $loan->has('employee') ? $this->Html->link($loan->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $loan->employee->id]) : '' ?></td>
                        <td><?= $this->Number->format($loan->principal) ?></td>
                        <td><?= $loan->has('loan_type') ? $this->Html->link($loan->loan_type->name, ['controller' => 'Loans', 'action' => 'view', $loan->loan_type->id]) : '' ?></td>
                        <td><?= $this->Number->format($loan->tenor) ?></td>
                        <td><?= $this->Number->format($loan->payment_count) ?></td>
                        <td><?= $this->Number->format($loan->rate) ?></td>
                        <td><?= $this->Number->format($loan->interest) ?></td>
                        <td><?= $this->Number->format($loan->total) ?></td>
                        <td><?= $this->Number->format($loan->deduction) ?></td>
                        <td><?= h($loan->date) ?></td>
                        <td><?= $loan->has('status') ? $this->Html->link($loan->status->name, ['controller' => 'Statuses', 'action' => 'view', $loan->status->id]) : '' ?></td>
                        <!-- <td><?= h($loan->created) ?></td> -->
                        <td><?= h($loan->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $loan->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loan->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
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
