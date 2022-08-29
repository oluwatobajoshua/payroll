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

<section class="invoice p-3 no-print">
  <div class="box-header with-border">
    <h4 class="box-title"><?php echo __('Staff List'); ?></h4>
  </div>
  <?= $this->Form->create(null, ['id' => 'empForm']) ?>
  <div class="callout callout-info">
    <div class="row">
      <?php
      $this->Form->setTemplates([
        'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
      ]);
      echo $this->Form->control('bank', ['options' => $bankList, 'empty' => 'Select Education', 'title' => 'Please select a branch before selecting a section', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
      ?>
      
    </div>
  </div>
  <?= $this->Form->end() ?><a href="" class="btn btn-xs btn-default no-print pull-right" onClick="window.print();"><i class="fa fa-print"></i> Print</a>
</section>
<!-- Main content -->
<section class="invoice p-3">
  <!-- Main content -->
  <!-- Table row -->

  <?php foreach ($banks as $bank) :
    $id = 0;
    $ttotal    = 0.00;
  ?>

    <div class="row">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="col-xs-8 ">
        <!-- date -->

        <br>
        <br>
        <!-- Bank Address -->
        <span>THE MANAGER <span class='pull-right'><?= $company->date->format('M, Y'); ?></span></span><br>
        <span><?= h($bank->name) ?></span><br>
        <span><?= h($bank->branch) ?></span><br>
        <br>
        <p>Dear sir/Madam,</p>
        <p><b>ILEYA/EXMAS BONUS FOR YEAR <?= h($company->date->year); ?></b></p>
        <p>PLEASE CREDIT THE ACCOUNTS OF THE FOLLOWING STAFF AS PER OUR ATTACHED <br> CHEUQUE NO: ______________________ DATE: _____________ </p>
        <?php if (count($bank->employees) > 0) : ?>
          <div class="table-responsive">
            <table class="table table-bordered table1">
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
                    $total = $t->ileya_xmas_bonus;
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
    <!-- <hr /> -->
  <?php endforeach  ?>
  <!-- /.content -->
</section>
<!-- /.content -->