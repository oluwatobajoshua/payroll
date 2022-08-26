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
            <!-- <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?> -->
            <?php echo $this->Html->link(__('Employees'), ['controller' => 'Employees', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm', 'rel' => 'tooltip', 'title' => 'Go back to employee & select view to add a new transaction']) ?>
            <?= $this->Form->postLink(__('New Month'), ['controller' => 'transactions', 'action' => 'newMonth'], ['confirm' => __('You are about to begin {0}?', 'New Month'), 'class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('basic_salary') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('housing_allowance', ['label' => 'Housing Allow']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transport_allowance', ['label' => 'Trans Allow']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('utility_allowance', ['label' => 'Utility Allow']) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('pension_deduction') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('paye') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('ctcs') ?></th>
                    <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('domestic_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('living_in_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('medical_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('other_allowance') ?></th>                                  
                  <th scope="col"><?= $this->Paginator->sort('other_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('drivers_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('bar_account') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('union_due') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('arrears') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('sc_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('personal_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('BRO_HCICS') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('surcharge') ?></th> -->
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td></td>
                        <td><?= $transaction->has('employee') ? $this->Html->link($transaction->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $transaction->employee->id]) : '' ?></td>
                        <td><?= h($transaction->date->format('M-Y')) ?></td>
                        <td><?= $this->Number->format($transaction->basic_salary, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->housing_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->transport_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->utility_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->pension_deduction, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->paye, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <td><?= $this->Number->format($transaction->ctcs, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                        <!--<td><?= h($transaction->created) ?></td>
                  <td><?= h($transaction->modified) ?></td>
                  <td><?= $this->Number->format($transaction->domestic_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->living_in_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->medical_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->entertainment_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->other_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>                                    
                  <td><?= $this->Number->format($transaction->other_deduction, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->salary_advance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->drivers_allowance, ['places' => 2, 'pattern' => 0, 000.00, 'before' => '₦']) ?></td>
                  <td><?= $this->Number->format($transaction->bar_account) ?></td>
                  <td><?= $this->Number->format($transaction->union_due) ?></td>                  
                  <td><?= $this->Number->format($transaction->arrears) ?></td>
                  <td><?= $this->Number->format($transaction->sc_deduction) ?></td>
                  <td><?= $this->Number->format($transaction->ileya_xmas_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->end_of_year_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->service_charge) ?></td>
                  <td><?= $this->Number->format($transaction->personal_loan) ?></td>
                  <td><?= $this->Number->format($transaction->surcharge) ?></td>-->
                        <td class="actions text-right">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id], ['class' => 'btn btn-info btn-xs']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class' => 'btn btn-warning btn-xs']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'btn btn-danger btn-xs']) ?>
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