<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<?php
$this->assign('title', __('Employees'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees'],
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
            <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('staff No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Full Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salary') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('bank_id') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('acct_no') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge_number') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge_bank') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('cadre_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('grade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('housing_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('housing_upfront') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('cadre_id') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('utility_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transport_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('domestic_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tax_number') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tax_relief') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tax_paid_to_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pension_no') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('medical_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('other_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('personal_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pers_loan_rep') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pers_loan_paid') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pers_loan_inst') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('car_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('car_loan_rep') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('car_loan_inst') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('car_loan_paid') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('whl_cics') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pension_control') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance_rep') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance_paid') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance_inst') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('drivers_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('bro_HCICS') ?></th>-->
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employees as $employee) : ?>
                <tr>
                  <td><?= $this->Number->format($employee->id) ?></td>
                  <td><?= $this->Number->format($employee->staff_no) ?></td>
                  <td><?= h($employee->full_name) ?></td>
                  <td><?= $this->Number->format($employee->salary, ['places' => 2]) ?></td>
                  <!--<td><?= $employee->has('bank') ? $this->Html->link($employee->bank->bank_desc, ['controller' => 'Banks', 'action' => 'view', $employee->bank->id]) : '' ?></td>-->
                  <!--<td><?= h($employee->acct_no) ?></td>
                  <td><?= h($employee->service_charge_number) ?></td>
                  <td><?= $this->Number->format($employee->service_charge_bank) ?></td>-->
                  <td><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></td>
                  <td><?= $employee->has('section') ? $this->Html->link($employee->section->name, ['controller' => 'Sections', 'action' => 'view', $employee->section->id]) : '' ?></td>
                  <!--<td><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></td>-->
                  <td><?= $employee->has('grade') ? $this->Html->link($employee->grade->name, ['controller' => 'Grades', 'action' => 'view', $employee->grade->id]) : '' ?></td>
                  <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>                  <!--
                  <td><?= $this->Number->format($employee->housing_allowance) ?></td>
                  <td><?= h($employee->housing_upfront) ?></td>
                  <td><?= $employee->has('designation') ? $this->Html->link($employee->designation->name, ['controller' => 'Designations', 'action' => 'view', $employee->designation->id]) : '' ?></td>
                  
                  <td><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></td>                  
                  <td><?= $this->Number->format($employee->utility_allowance, ['places' => 2]) ?></td>
                  <td><?= $this->Number->format($employee->transport_allowance) ?></td>
                  <td><?= $this->Number->format($employee->domestic_allowance) ?></td>
                  <td><?= h($employee->tax_number) ?></td>
                  <td><?= $this->Number->format($employee->tax_relief) ?></td>
                  <td><?= $this->Number->format($employee->tax_paid_to_date) ?></td>
                  <td><?= h($employee->pension_no) ?></td>
                  <td><?= $this->Number->format($employee->medical_allowance) ?></td>
                  <td><?= $this->Number->format($employee->entertainment_allowance) ?></td>
                  <td><?= $this->Number->format($employee->other_allowance) ?></td>
                  <td><?= $this->Number->format($employee->personal_loan) ?></td>
                  <td><?= $this->Number->format($employee->pers_loan_rep) ?></td>
                  <td><?= $this->Number->format($employee->pers_loan_paid) ?></td>
                  <td><?= $this->Number->format($employee->pers_loan_inst) ?></td>
                  <td><?= $this->Number->format($employee->car_loan) ?></td>
                  <td><?= $this->Number->format($employee->car_loan_rep) ?></td>
                  <td><?= $this->Number->format($employee->car_loan_inst) ?></td>
                  <td><?= $this->Number->format($employee->car_loan_paid) ?></td>
                  <td><?= $this->Number->format($employee->whl_cics) ?></td>
                  <td><?= $this->Number->format($employee->pension_control) ?></td>
                  <td><?= $this->Number->format($employee->salary_advance) ?></td>
                  <td><?= $this->Number->format($employee->salary_advance_rep) ?></td>
                  <td><?= $this->Number->format($employee->salary_advance_paid) ?></td>
                  <td><?= $this->Number->format($employee->salary_advance_inst) ?></td>
                  <td><?= $this->Number->format($employee->drivers_allowance) ?></td>
                  <td><?= $this->Number->format($employee->bro_HCICS) ?></td>-->
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->name_desc), 'class' => 'btn btn-xs btn-outline-danger', 'escape' => false]) ?>
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
