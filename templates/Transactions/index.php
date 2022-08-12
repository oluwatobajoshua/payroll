<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transactions
 */
?>
<?php
$this->assign('title', __('Transactions'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Transactions'],
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
            <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('basic_salary') ?></th>
                    <th><?= $this->Paginator->sort('domestic_allowance') ?></th>
                    <th><?= $this->Paginator->sort('housing_allowance') ?></th>
                    <th><?= $this->Paginator->sort('transport_allowance') ?></th>
                    <th><?= $this->Paginator->sort('utility_allowance') ?></th>
                    <th><?= $this->Paginator->sort('living_in_allowance') ?></th>
                    <th><?= $this->Paginator->sort('medical_allowance') ?></th>
                    <th><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                    <th><?= $this->Paginator->sort('leave_allowance') ?></th>
                    <th><?= $this->Paginator->sort('other_allowance') ?></th>
                    <th><?= $this->Paginator->sort('gross') ?></th>
                    <th><?= $this->Paginator->sort('paye') ?></th>
                    <th><?= $this->Paginator->sort('whl_cics') ?></th>
                    <th><?= $this->Paginator->sort('pension_deduction') ?></th>
                    <th><?= $this->Paginator->sort('other_deduction') ?></th>
                    <th><?= $this->Paginator->sort('total_deduction') ?></th>
                    <th><?= $this->Paginator->sort('net_pay') ?></th>
                    <th><?= $this->Paginator->sort('salary_advance') ?></th>
                    <th><?= $this->Paginator->sort('drivers_allowance') ?></th>
                    <th><?= $this->Paginator->sort('bar_account') ?></th>
                    <th><?= $this->Paginator->sort('union_due') ?></th>
                    <th><?= $this->Paginator->sort('tax_amount') ?></th>
                    <th><?= $this->Paginator->sort('arrears') ?></th>
                    <th><?= $this->Paginator->sort('sc_deduction') ?></th>
                    <th><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                    <th><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                    <th><?= $this->Paginator->sort('service_charge') ?></th>
                    <th><?= $this->Paginator->sort('personal_loan') ?></th>
                    <th><?= $this->Paginator->sort('ctcs') ?></th>
                    <th><?= $this->Paginator->sort('bro_cics') ?></th>
                    <th><?= $this->Paginator->sort('surcharge') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?= $this->Number->format($transaction->id) ?></td>
                        <td><?= $transaction->has('employee') ? $this->Html->link($transaction->employee->id, ['controller' => 'Employees', 'action' => 'view', $transaction->employee->id]) : '' ?></td>
                        <td><?= $transaction->has('company') ? $this->Html->link($transaction->company->name, ['controller' => 'Companies', 'action' => 'view', $transaction->company->id]) : '' ?></td>
                        <td><?= h($transaction->date) ?></td>
                        <td><?= $this->Number->format($transaction->basic_salary) ?></td>
                        <td><?= $this->Number->format($transaction->domestic_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->housing_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->transport_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->utility_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->living_in_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->medical_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->entertainment_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->leave_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->other_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->gross) ?></td>
                        <td><?= $this->Number->format($transaction->paye) ?></td>
                        <td><?= $this->Number->format($transaction->whl_cics) ?></td>
                        <td><?= $this->Number->format($transaction->pension_deduction) ?></td>
                        <td><?= $this->Number->format($transaction->other_deduction) ?></td>
                        <td><?= $this->Number->format($transaction->total_deduction) ?></td>
                        <td><?= $this->Number->format($transaction->net_pay) ?></td>
                        <td><?= $this->Number->format($transaction->salary_advance) ?></td>
                        <td><?= $this->Number->format($transaction->drivers_allowance) ?></td>
                        <td><?= $this->Number->format($transaction->bar_account) ?></td>
                        <td><?= $this->Number->format($transaction->union_due) ?></td>
                        <td><?= $this->Number->format($transaction->tax_amount) ?></td>
                        <td><?= $this->Number->format($transaction->arrears) ?></td>
                        <td><?= $this->Number->format($transaction->sc_deduction) ?></td>
                        <td><?= $this->Number->format($transaction->ileya_xmas_bonus) ?></td>
                        <td><?= $this->Number->format($transaction->end_of_year_bonus) ?></td>
                        <td><?= $this->Number->format($transaction->service_charge) ?></td>
                        <td><?= $this->Number->format($transaction->personal_loan) ?></td>
                        <td><?= $this->Number->format($transaction->ctcs) ?></td>
                        <td><?= $this->Number->format($transaction->bro_cics) ?></td>
                        <td><?= $this->Number->format($transaction->surcharge) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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
