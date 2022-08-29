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

th,
td {
    font-size: 18px;
}

@media print {
    .pagebreak {
        page-break-after: always;
    }

    /* page-break-after works, as well */
}
</style>

<!-- Main content -->
<!-- Table row -->
<div class="row">
    <div class="col-xs-12">
        <h3 class="">
            <?= h($company->name) ?>
            <?php if($bName){ 
            echo '(' ;
            echo ($bName->name);
            echo ')' ;
          } ?>
        </h3>

        SUMMARY OF
        <?php if($cName){ 
          echo $cName->name; 
          } 
        ?>
        SALARY FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>

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
      $gtdomestic  = 0.00;
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
      $gtscharge   = 0.00;
      $gtixb       = 0.00;
      $gttotald    = 0.00;
      $gtnetpay    = 0.00;    
    ?>

    <?php foreach ($departments as $department): 
          $id         = 0; 
          $tbasic     = 0.00;
          $ttrans     = 0.00;
          $thouse     = 0.00;
          $tutility   = 0.00;
          $tleave     = 0.00;
          $tentert    = 0.00;
          $tmedical   = 0.00;
          $tdomestic   = 0.00;
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
          $tscharge   = 0.00;
          $tixb       = 0.00;
          $ttotald    = 0.00;
          $tnetpay    = 0.00;
        ?>
    <?php if(count($department->employees) > 0): ?>
    <div class="col-xs-12 table-responsive">
        <?php foreach ($department->employees as $employees): ?>
        <?php foreach ($employees->transactions as $t): 
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
                $tbar       += $t->bar_account	;
                $totherd    += $t->other_deduction;
                $tscharge   += $t->service_charge;
                $tixb       += $t->ileya_xmas_bonus;
                $ttotald    += $t->total_deduction;
                $tnetpay    += $t->net_pay;
                
                //id
                $id++;
              ?>

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
        $gtscharge  += $tscharge;
        $gtixb      += $tixb;
        $gttotald   += $ttotald;
        $gtnetpay   += $tnetpay;
      ?>
    </div>
    <?php endif ?>
    <?php endforeach  ?>
    <!-- /.col -->

</div>

<div class="row">
    <div class="col-xs-12 ">
        <div class="col-xs-12 table-responsive">
            <!--General Pay Advice -->
            <div class="row">
                <div class="col-xs-12">
                    <h6 class="">
                        <?php echo $this->Html->image('premierhotel_logo2.jpeg', array('class' => 'img-squre', 'alt' => 'User Image','width'=>'150px')); ?>
                    </h6>
                </div>
                <table class="">
                    <tbody>
                        <tr>
                            <td><?= h("Basic") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtbasic,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Transport Allowance          ") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gttrans,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Housing Allowance") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gthouse,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Utility Allowance") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtutility,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Domestic Allowance") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtdomestic,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Entertainment Allowance          ") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtentert,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Living in Allowance") ?></td>
                            <td style="text-align:right"></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Arrears") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtarrears,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Outfit Allowance") ?></td>
                            <td style="text-align:right"></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Furniture Allowance") ?></td>
                            <td style="text-align:right"></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Ileya/Xmas Bonus") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtixb,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Other Allowance") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtleave,2) ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:right"></td>
                            <td><?= $this->Number->precision($gtbasic,2) ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?= h("Service Charge") ?></td>
                            <td style="text-align:right"></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtscharge,2) ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th><u><?= h("Gross for the month") ?></u></td>
                            <td></td>
                            <th style="text-align:right"></th>
                            <th style="text-align:right"><?= $this->Number->precision($gtgross + $gtscharge ,2) ?></th>
                        </tr>
                        <tr>
                            <td>_____________________</td>
                        </tr>
                        <tr>
                            <th><u><?= h("DEDUCTIONS") ?></u></th>
                            <t><?= h("") ?></td>
                                <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("P.A.Y.E") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtpaye,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Personal Loan") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtpersloan,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("CTCS") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtctcs ,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Salary Advance") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtsaladv,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Surcharge") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtsur,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Union Due") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtuniond,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Pension") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtpension,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Bar Account") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtbar,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Service Charge") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtscharge,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>
                        <tr>
                            <td><?= h("Others") ?></td>
                            <td style="text-align:right"><?= $this->Number->precision($gtotherd,2) ?></td>
                            <td><?= h("") ?></td>
                        </tr>

                        <tr>
                            <th><u><?= h("TOTAL DEDUCTION") ?></u></td>
                            <td></td>
                            <th style="text-align:right"><u><?= $this->Number->precision($gttotald,2)?></u></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th><u><?= h("NET FOR THE MONTH") ?></u></td>
                            <td></td>
                            <th style="text-align:right"></th>
                            <th style="text-align:right"><u><?= $this->Number->precision($gtnetpay,2) ?></u></th>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <!-- /.col -->
            </div>
            <div class="col-xs-6">
                <div class="col-xs-4">
                    <h4>______________ PREPARED BY </h4>
                </div>
                <div class="col-xs-4">
                    <h4>______________ VETTED BY </h4>
                </div>
                <div class="col-xs-4">
                    <h4>______________ APPROVED BY </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.col -->
</div>
<!-- /.row -->