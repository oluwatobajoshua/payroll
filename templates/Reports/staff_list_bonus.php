<style>
  table.table-bordered {
    border: 1px solid black;
    margin-top: 20px;
  }

  table.table-bordered>thead>tr>th {
    border: 1px solid black;
  }

  table.table-bordered>tbody>tr>td {
    border: 1px solid black;
  }
</style>

<?php

use Cake\I18n\FrozenTime;

$time = FrozenTime::now();
?>
<section class="invoice p-3 no-print">
  <div class="card card-primary card-outline no-print">
    <?= $this->Form->create($company, ['id'=>'empForm']) ?>
    <div class="card-body">
      <?php
      $this->Form->setTemplates([
        'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
      ]);
      echo $this->Form->control('bank', ['options' => $bankList, 'empty' => 'Select Bank', 'onChange' => 'document.getElementById("empForm").submit();']);
      ?>
    </div>

    <div class="card-footer d-flex">
      <div class="ml-auto">
        <?= $this->Form->button(__('Print'), ['onClick' => 'window.print();']) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>
  </div>
</section>
<!-- Main content -->
<section class="invoice p-3">
  <!-- Main content -->
  <!-- Table row -->

  <?php foreach ($banks as $bank) :
    $id = 0;
    $ttotal    = 0.00;
  ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="row">
      <div class="col-xs-8 ">
        <!-- date -->
        <p><?= $company->date->format('M, Y'); ?></p>
        <br>
        <br>
        <!-- Bank Address -->
        <span>THE MANAGER <span class='pull-right'><?= $company->date->format('M, Y'); ?></span></span><br>
        <span><?= h($bank->name) ?></span><br>
        <span><?= h($bank->branch) ?></span><br>
        <br>
        <p>Dear sir/Madam,</p>
        <p><b>END OF THE YEAR FOR <?= h($company->date->year); ?></b></p>
        <p>PLEASE CREDIT THE ACCOUNTS OF THE FOLLOWING STAFF AS PER OUR ATTACHED <br> CHEUQUE NO: ______________________ DATE: _____________ </p>
        <?php if (count($bank->employees) > 0) : ?>
          <div class="table-responsive">
            <table class="table table-bordered datatable">
              <thead>
                <tr style="text-align:center">
                  <th style="text-align:center">S/N</th>
                  <th style="text-align:center">STAFF NO</th>
                  <th style="text-align:center">NAME OF STAFF </th>
                  <th style="text-align:center">ACCOUNT NUMBER</th>
                  <th style="text-align:center">TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($bank->employees as $employee) : ?>
                  <?php foreach ($employee->transactions as $t) :
                    $total = $t->basic_salary;
                    $ttotal    += $total;
                    //id
                    $id++;
                  ?>
                    <tr style="text-align:right">
                      <td style="text-align:center"><?= h($id) ?></td>
                      <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
                      <td style="text-align:left"><?= h($t->employee->full_name) ?></td>
                      <td style="text-align:center"><?= h($t->employee->acct_no) ?></td>
                      <td><?= $this->Number->precision($total, 2) ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php endforeach ?>
                <thead>
                  <tr style="text-align:right">
                    <th colspan="4" style="text-align:left"> Group Total</th>
                    <th style="text-align:right"><?= $this->Number->precision($ttotal, 2) ?></th>
                  </tr>
                  <thead>
              </tbody>
            </table>
          </div>
        <?php endif ?>
      </div>
      <!-- /.col -->
    </div>
    <hr />
  <?php endforeach  ?>

  <!-- /.content -->
</section>
<!-- /.content -->