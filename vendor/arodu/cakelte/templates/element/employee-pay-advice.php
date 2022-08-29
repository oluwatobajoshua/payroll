<style>
  @media print {
    .pagebreak {
      page-break-after: always;
    }

    /* page-break-after works, as well */
  }
</style>

<!-- Main content -->
<!-- Table row -->
<?php foreach ($sections as $section) : ?>
  <!-- <div class="row"> -->
  <div class="col-12 ">
    <div class="col-8 ">
      <?php foreach ($section->employees as $employees) : ?>
        <?php foreach ($employees->transactions as $t) : ?>
          <!--General Pay Advice -->
          <?php if ($gpa) : ?>
            <div class="row">
              <div class="col-12">
                <h4 class="">
                  <?= h($company->name) ?> <?= h($company->address) ?>
                </h4>
              </div>
              <div class="col-12">
                <h6 class="">
                  <?php echo $this->Html->image('premierhotel_logo2.jpeg', array('class' => 'img-squre', 'alt' => 'User Image', 'width' => '150px')); ?> EMPLOYEE PAY ADVICE FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>
                </h6>
              </div>
              <table class="table-responsive">
                <tbody>
                  <tr>
                    <td><?= h("Name of Staff") ?></td>
                    <td><?= h($t->employee->full_name) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Staff Code") ?></td>
                    <td><?= h($t->employee->staff_no) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Cadre") ?></td>
                    <td><?= h($t->employee->cadre->name) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Bank") ?></td>
                    <td><?= h($t->employee->bank->name) ?></td>
                    <td><?= h("Account No: ") ?><?= h($t->employee->acct_no) ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("EARNINGS") ?></u></th>
                    <td><?= h("") ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Basic") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->basic_salary, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Transport Allowance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->transport_allowance, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Housing Allowance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->housing_allowance, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Other Allowance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->other_allowance, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Utility Allowance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->utility_allowance, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Arrears") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->arrears, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("GROSS") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><?= $this->Number->precision($t->gross, 2) ?></th>
                  </tr>
                  <tr>
                    <th><u><?= h("DEDUCTIONS") ?></u></th>
                    <t><?= h("") ?></td>
                      <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("P.A.Y.E") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->paye, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Personal Loan") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->personal_loan, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Coop Contribution") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->BRO_HCICS, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Pension") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->pension, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Salary Advance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->salary_advance, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Surcharge") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->surcharge, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Union Due") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->union_due, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Bar Account") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->bar_account, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Others") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->other_deduction, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Car Loan/Insurance") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->arrears, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("TOTAL DEDUCTION") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><u><?= $this->Number->precision($t->total_deduction, 2) ?></u></th>
                  </tr>
                  <tr>
                    <th><u><?= h("NET PAY") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><u><?= $this->Number->precision($t->net_pay, 2) ?></u></th>
                  </tr>
                </tbody>
              </table>
              <hr />
              <?php if (!$spa && $gpa) : ?>
                <div class="pagebreak"></div>
              <?php endif ?>
              <!-- /.col -->
            </div>

          <?php endif ?>

          <!--Service Charge -->
          <?php if ($spa) : ?>
            <div class="row ">
              <div class="col-12">
                <h4 class="">
                  <?= h($company->name) ?> <?= h($company->address) ?>
                </h4>
              </div>
              <div class="col-12">
                <h6 class="">
                  <?php echo $this->Html->image('premierhotel_logo2.jpeg', array('class' => 'img-squre', 'alt' => 'User Image', 'width' => '150px')); ?> EMPLOYEE PAY ADVICE FOR <?= h($company->date->year) ?>
                </h6>
              </div>
              <table class="">
                <tbody>
                  <tr>
                    <td><?= h("Name of Staff") ?></td>
                    <td><?= h($t->employee->full_name) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Staff Code") ?></td>
                    <td><?= h($t->employee->staff_no) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Cadre") ?></td>
                    <td><?= h($t->employee->cadre->name) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Bank") ?></td>
                    <td><?= h($t->employee->bank->name) ?></td>
                    <td><?= h("Account No: ") ?><?= h($t->employee->acct_no) ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("OTHER EARNINGS") ?></u></th>
                    <t><?= h("") ?></td>
                      <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td style="color:white"><?= h("Basic") ?></td>
                    <td></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td style="color:white"></td>
                    <td style="text-align:right"></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Ileya/Xmas Bonus") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->ileya_xmas_bonus, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Service Charge") ?></td>
                    <td style="text-align:right"><?= $this->Number->precision($t->service_charge, 2) ?></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("TOTAL") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><?= $this->Number->precision($t->ileya_xmas_bonus + $t->service_charge, 2) ?></th>
                  </tr>
                  <tr>
                    <td style="color:white"><?= h("Personal Loan") ?></td>
                    <td style="text-align:right"></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td style="color:white"><?= h("Coop Contribution") ?></td>
                    <td style="text-align:right"></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td style="color:white"><?= h("Pension") ?></td>
                    <td style="text-align:right"></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <th><u><?= h("DEDUCTIONS") ?></u></th>
                    <t><?= h("") ?></td>
                      <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td style="color:white"><?= h("Salary Advance") ?></td>
                    <td style="text-align:right"></td>
                    <td><?= h("") ?></td>
                  </tr>
                  <tr>
                    <td><?= h("Others Deduction") ?></td>
                    <td style="text-align:right"></td>
                    <td><u><?= $this->Number->precision($t->other_deduction, 2) ?></u></td>
                  </tr>
                  <tr>
                    <th><u><?= h("TOTAL DEDUCTION") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><u><?= $this->Number->precision($t->other_deduction, 2) ?></u></th>
                  </tr>
                  <tr>
                    <th><u><?= h("NET PAY") ?></u></td>
                    <td></td>
                    <th style="text-align:right"><u><?= $this->Number->precision(($t->ileya_xmas_bonus + $t->service_charge) - $t->other_deduction, 2) ?></u></th>
                  </tr>
                </tbody>
              </table>
              <hr /><!-- /.col -->
              <?php if ($spa && !$gpa) : ?>
                <div class="pagebreak"></div>
              <?php endif ?>
            </div>

            <?php if ($spa && $gpa) : ?>
              <div class="pagebreak"></div>
            <?php endif ?>
          <?php endif ?>
        <?php endforeach ?>
      <?php endforeach ?>
    </div>
  </div>
  <!-- /.col -->
  <!-- </div> -->
<?php endforeach  ?>
<!-- /.content -->