<?php use Cake\I18n\FrozenDate; 
  $time = FrozenDate::now();
?>

<!-- Main content -->
    <!-- Table row -->            
            
    <?php foreach ($banks as $bank):?>      

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
          <div class="col-xs-12 ">       
            <!-- date -->                        
            <p><?=$company->date->format('M, Y');?></p>            
            <br>
            <br>           
            <!-- Bank Address -->
            <span>THE MANAGER</span><br>
            <span><?= h($bank->name) ?></span><br>
            <span><?= h($bank->branch) ?></span><br>
            <br>

            <p>Dear sir,</p>
            &nbsp;
            <p><b>STAFF SALARY FOR <?= h($company->date->month); ?>, <?= h($company->date->year); ?></b></p>
            <p>Attached is the list of our Staff using your Bank and their Salaries for the Month. Kinldy credit <br> their respective accounts with the amount that appear against their names.</p>
            <br>
            <br>
            <p>Yours faithfully, </p>
            <br>
            <br>
            <br>
            <p><?= h($company->employee->full_name); ?></p>
            <p>ACCOUNT OFFICER</p>
          </div>      
          <!-- /.col -->
        </div> 
        <hr />     
    <?php endforeach  ?>    

  <!-- /.content -->