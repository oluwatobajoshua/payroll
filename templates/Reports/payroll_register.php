<?php

use Cake\I18n\FrozenTime;
?>
<style>
  td {
    border: 1px solid black;
    margin: 1px;
    padding: 2px;
    width: 100%;
  }

  th {
    border: 1px solid black;
    vertical-align: top;
    text-align: center;
    padding: 2px;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?= $this->Form->create(null, ['id' => 'empForm']) ?>
        <div class="callout callout-info">
          <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
            ]);

            echo $this->Form->control('branch', ['options' => $branches, 'empty' => 'Select branch', 'title' => 'Select a Cadre', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('cadre', ['options' => $cadres, 'empty' => 'Select a cadre', 'title' => 'Select a Cadre', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('highest_education_id', ['options' => $highestEducations, 'empty' => 'Select Education', 'title' => 'Highest Education', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
            echo $this->Form->control('section', ['options' => $depts, 'empty' => 'Select Education', 'title' => 'Please select a branch before selecting a section', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);

            ?>
          </div>
        </div>
        <?= $this->Form->end() ?>
        <section class="invoice p-3 mb-3">
          <div class="row">
            <div class="col-12">
              <h4 class="">
                <?= h($company->name) ?>
                <?php if ($bName) {
                  echo '(';
                  echo ($bName->name);
                  echo ')';
                } ?>
              </h4>
              <?php if ($cName) {
                echo $cName->name;
              }
              ?>
              PAYROLL REGISTER FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>

            </div>
            <?php
            //grand total 
            $gtbasic     = 0.00;
            $gttrans     = 0.00;
            $gthouse     = 0.00;
            $gtutility   = 0.00;
            $gtleave     = 0.00;
            $gtentert    = 0.00;
            $gtmedical   = 0.00;
            $gtarrears   = 0.00;
            $gtother     = 0.00;
            $gtgross     = 0.00;
            $gtpaye      = 0.00;
            $gtpersloan  = 0.00;
            $gtctcs      = 0.00;
            $gtsaladv    = 0.00;
            $gtsur       = 0.00;
            $gtuniond    = 0.00;
            $gtpension   = 0.00;
            $gtbar       = 0.00;
            $gtotherd    = 0.00;
            $gttotald    = 0.00;
            $gtnetpay    = 0.00;
            ?>
            <div class="col-xs-12 table-responsive no-padding">
              <table class="table table-bordered">
                <thead>
                  <tr style="text-align:center">
                    <th>S/N</th>
                    <th>STAFF<br>NO</th>
                    <th>GRADE</th>
                    <th style="text-align:center">NAME OF STAFF </th>
                    <th>BASIC SALARY</th>
                    <th>TRANSP.</th>
                    <th>HOUSING</th>
                    <th>UTILITY</th>
                    <th>LEAVE ALLOW</th>
                    <th>ENTERT.</th>
                    <th>MEDIC. ALLOW</th>
                    <th>ARREARS</th>
                    <th>OTHER ALLOW</th>
                    <th>GROSS</th>
                    <th>P.A.Y.E</th>
                    <th>PERS LOAN</th>
                    <th>CTCS</th>
                    <th>SALARY ADVANCE</th>
                    <th>SURCHARGE</th>
                    <th>UNION DUE</th>
                    <th>PENSION</th>
                    <!--<th>BAR ACCT</th>-->
                    <!--<th>OTHER <br> DEDUCT.</th>-->
                    <th>TOTAL DEDU</th>
                    <th>NETPAY</th>
                  </tr>
                </thead>

                <?php $id  = 0 ?>
                <?php foreach ($sections as $section) :

                  $tbasic     = 0.00;
                  $ttrans     = 0.00;
                  $thouse     = 0.00;
                  $tutility   = 0.00;
                  $tleave     = 0.00;
                  $tentert    = 0.00;
                  $tmedical   = 0.00;
                  $tarrears   = 0.00;
                  $tother     = 0.00;
                  $tgross     = 0.00;
                  $tpaye      = 0.00;
                  $tpersloan  = 0.00;
                  $tctcs      = 0.00;
                  $tsaladv    = 0.00;
                  $tsur       = 0.00;
                  $tuniond    = 0.00;
                  $tpension   = 0.00;
                  $tbar       = 0.00;
                  $totherd    = 0.00;
                  $ttotald    = 0.00;
                  $tnetpay    = 0.00;
                ?>
                  <?php if (count($section->employees) > 0) : ?>
                    <thead>
                      <!-- <tr style="text-align:center">
                        <th></th>
                        <th>
                            <h5> <?= h($department->name); ?> </h5>
                        </th>
                        <th> </th>
                        <th style="text-align:center"> </th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th> </th>
                        <th></th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th></th>
                        <th> <br> </th>
                        <th> </th>
                        <th></th>
                        <th></th>
                        <th> </th>
                        <th> </th>
                    </tr>-->
                    </thead>
                    <tbody>
                      <?php foreach ($section->employees as $employees) : ?>
                        <?php foreach ($employees->transactions as $t) :
                          $tbasic     += $t->basic_salary;
                          $ttrans     += $t->transport_allowance;
                          $thouse     += $t->housing_allowance;
                          $tutility   += $t->utility_allowance;
                          $tleave     += $t->leave_allowance;
                          $tentert    += $t->entertainment_allowance;
                          $tmedical   += $t->medical_allowance;
                          $tarrears   += $t->arrears;
                          $tother     += $t->other_allowance;
                          $tgross     += $t->gross;
                          $tpaye      += $t->paye;
                          $tpersloan  += $t->personal_loan;
                          $tctcs      += $t->ctcs;
                          $tsaladv    += $t->salary_advance;
                          $tsur       += $t->surcharge;
                          $tuniond    += $t->union_due;
                          $tpension   += $t->pension_deduction;
                          $tbar       += $t->bar_account;
                          $totherd    += $t->other_deduction;
                          $ttotald    += $t->total_deduction;
                          $tnetpay    += $t->net_pay;

                          //id
                          $id++;
                        ?>
                          <tr style="text-align:right">
                            <td style="text-align:center"><?= h($id) ?></td>
                            <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
                            <td style="text-align:center"><?= h($t->employee->grade->name) ?></td>
                            <td style="text-align:left"><?= h($t->employee->full_name) ?></td>
                            <td><?= $this->Number->precision($t->basic_salary, 2) ?></td>
                            <td><?= $this->Number->precision($t->transport_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->housing_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->utility_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->leave_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->entertainment_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->medical_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->arrears, 2) ?></td>
                            <td><?= $this->Number->precision($t->other_allowance, 2) ?></td>
                            <td><?= $this->Number->precision($t->gross, 2) ?>
                            <td><?= $this->Number->precision($t->paye, 2) ?></td>
                            <td><?= $this->Number->precision($t->personal_loan, 2) ?></td>
                            <td><?= $this->Number->precision($t->ctcs, 2) ?></td>
                            <td><?= $this->Number->precision($t->salary_advance, 2) ?></td>
                            <td><?= $this->Number->precision($t->surcharge, 2) ?></td>
                            <td><?= $this->Number->precision($t->union_due, 2) ?></td>
                            <td><?= $this->Number->precision($t->pension_deduction, 2) ?></td>
                            <!--<td><?= $this->Number->precision($t->bar_account, 2) ?></td>
                        <td><?= $this->Number->precision($t->other_deduction, 2) ?></th>-->
                            <td><?= $this->Number->precision($t->total_deduction, 2) ?></td>
                            <td><?= $this->Number->precision($t->net_pay, 2) ?></td>
                          </tr>
                        <?php endforeach ?>
                      <?php endforeach ?>
                      <?php
                      //get grand total 
                      $gtbasic    += $tbasic;
                      $gttrans    += $ttrans;
                      $gthouse    += $thouse;
                      $gtutility  += $tutility;
                      $gtleave    += $tleave;
                      $gtentert   += $tentert;
                      $gtmedical  += $tmedical;
                      $gtarrears  += $tarrears;
                      $gtother    += $tother;
                      $gtgross    += $tgross;
                      $gtpaye     += $tpaye;
                      $gtpersloan += $tpersloan;
                      $gtctcs     += $tctcs;
                      $gtsaladv   += $tsaladv;
                      $gtsur      += $tsur;
                      $gtuniond   += $tuniond;
                      $gtpension  += $tpension;
                      $gtbar      += $tbar;
                      $gtotherd   += $totherd;
                      $gttotald   += $ttotald;
                      $gtnetpay   += $tnetpay;
                      ?>
                    </tbody>
                  <?php endif ?>
                <?php endforeach  ?>
                <thead>
                  <tr style="text-align:right">
                    <th colspan="4" style="text-align:center"> Group Total</th>
                    <th style="text-align:right"><?= $this->Number->precision($gtbasic, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gttrans, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gthouse, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtutility, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtleave, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtentert, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtmedical, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtarrears, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtother, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtgross, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtpaye, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtpersloan, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtctcs, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtsaladv, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtsur, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtuniond, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtpension, 2) ?></th>
                    <!--<th style="text-align:right"><?= $this->Number->precision($gtbar, 2) ?></th>
                        <th style="text-align:right"><?= $this->Number->precision($gtotherd, 2) ?></th>-->
                    <th style="text-align:right"><?= $this->Number->precision($gttotald, 2) ?></th>
                    <th style="text-align:right"><?= $this->Number->precision($gtnetpay, 2) ?></th>
                  </tr>
                </thead>
              </table>
            </div>

          </div>
          <!-- /.row -->
                        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>