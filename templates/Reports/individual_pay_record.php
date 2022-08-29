<style>
table.table-bordered {
    border: 2px solid black;
}

table.table-bordered>thead>tr>th {
    border: 2px solid black;
}

table.table-bordered>tbody>tr>td {
    border: 2px solid black;
}

th,
td {
    font-size: 18px;
}
</style>

<?php use Cake\I18n\Date; 
  $lastMonth = new Date($company->date);
  $lastMonth->modify('-1 month');
?>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-6 no-print">
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
                <div class="col-md-3" style="width:600px">
                    <label class="form-check-label" for="">Braches</label>
                    <?php echo $this->Form->select('branch',$branches,['empty'=>'Select branch','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                    <br>
                    <label class="form-check-label" for="">Cadre</label>
                    <?php echo $this->Form->select('cadres',$cadres,['empty'=>'Select a cadre','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                    <br>
                    <label class="form-check-label" for="">Demartment</label>
                    <?php echo $this->Form->select('id',$depts,['empty'=>'Select a department','title'=> 'Select a department','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="">
                <?= h($company->name) ?>
                <?php if($bName){ 
            echo '(' ;
            echo ($bName->name);
            echo ')' ;
          } ?>
            </h2>
            <h3>
                <?php if($cName){ 
          echo $cName->name; 
          } 
        ?>
                INDIVIDUAL PAR ROLL FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>
            </h3>

        </div>
        <?php 
      //grand total 
      $gtsal  = 0.00;
      $gtsc     = 0.00;
      $gtnet    = 0.00;      
         
    ?>
        <div class="col-xs-8 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="text-align:center">
                        <th>S/N</th>
                        <th>STAFF<br>NO</th>
                        <th>GRADE</th>
                        <th style="text-align:center">NAME OF STAFF </th>
                        <th> SALARY</th>
                        <th>SERVICE CHARGE</th>
                        <th>NET PAY</th>
                    </tr>
                </thead>
                <?php $id  = 0 ?>
                <?php foreach ($departments as $department):   
            $tsal  = 0.00;          
            $tsc     = 0.00;
            $tnet    = 0.00;            
          ?>
                <?php if(count($department->employees) > 0): ?>
                <thead>
                    <tr style="text-align:center">
                        <th></th>
                        <th>
                            <h5><?= h($department->name); ?> </h5>
                        </th>
                        <th> </th>
                        <th style="text-align:center"></th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($department->employees as $employees): ?>
                    <?php foreach ($employees->transactions as $t): 
                $sal      =   $t->net_pay + $t->service_charge;
                $tsal     += $sal;
                $tsc      += $t->service_charge;
                $tnet     += $t->net_pay;
                
                //id
                $id++;
              ?>
                    <tr style="text-align:right">
                        <td style="text-align:center"><?= h($id) ?></td>
                        <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
                        <td style="text-align:center"><?= h($t->employee->grade->name) ?></td>
                        <td style="text-align:left"><?= h($t->employee->name_desc) ?></td>
                        <td><?= $this->Number->precision($t->net_pay,2) ?></td>
                        <td><?= $this->Number->precision($t->service_charge,2) ?></td>
                        <td><?= $this->Number->precision($sal,2) ?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php endforeach ?>
                    <?php 
        //get grand total 
        $gtsal    += $tsal;
        $gtsc     += $tsc;
        $gtnet    += $tnet;
      ?>
                </tbody>
                <?php endif ?>
                <?php endforeach  ?>
                <thead>
                    <tr style="text-align:right">
                        <th colspan="4" style="text-align:center"> Group Total</th>
                        <th style="text-align:right"><?= $this->Number->precision($gtnet,2) ?></th>
                        <th style="text-align:right"><?= $this->Number->precision($gtsc,2) ?></th>
                        <th style="text-align:right"><?= $this->Number->precision($gtsal,2) ?></th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->