<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceCharge[]|\Cake\Collection\CollectionInterface $serviceCharges
 */
?>
<?php
$this->assign('title', __('Service Charges'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Service Charges'],
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
            <?= $this->Html->link(__('New Service Charge'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('grade_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                    <th><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                    <th><?= $this->Paginator->sort('njic_arrears') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($serviceCharges as $serviceCharge) : ?>
                    <tr>
                        <td><?= $this->Number->format($serviceCharge->id) ?></td>
                        <td><?= $serviceCharge->has('grade') ? $this->Html->link($serviceCharge->grade->name, ['controller' => 'Grades', 'action' => 'view', $serviceCharge->grade->id]) : '' ?></td>
                        <td><?= $this->Number->format($serviceCharge->amount) ?></td>
                        <td><?= $this->Number->format($serviceCharge->ileya_xmas_bonus) ?></td>
                        <td><?= $this->Number->format($serviceCharge->end_of_year_bonus) ?></td>
                        <td><?= $this->Number->format($serviceCharge->njic_arrears) ?></td>
                        <td><?= $serviceCharge->has('company') ? $this->Html->link($serviceCharge->company->name, ['controller' => 'Companies', 'action' => 'view', $serviceCharge->company->id]) : '' ?></td>
                        <td><?= h($serviceCharge->created) ?></td>
                        <td><?= h($serviceCharge->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $serviceCharge->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceCharge->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceCharge->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $serviceCharge->id)]) ?>
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
