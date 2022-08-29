<?php use Cake\Core\Configure; ?>
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>Staff</th>
                  <th>Customer</th>
                  <th>Total Credit(NGN)	</th>
                  <th>Total Debit(NGN)</th>
                  <th>Total Balance(NGN)</th>
                </tr>
                <tr>
                  <td>
                  <?php if (@$dash): ?>
                    <?= $u_count ?>                  
                  <?php endif; ?>
                  <?php if (@$co): ?>
                    <?= $branch->users_count ?>                 
                  <?php endif; ?>
                  </td>

                  <td>
                  <?php if (@$dash): ?>
                    <?= $c_count ?>                  
                  <?php endif; ?>
                  <?php if (@$co): ?>
                    <?= $branch->accounts_count ?>                  
                  <?php endif; ?>

                  </td>
                  <td>
                  <?php if (@$dash): ?>
                  <?= $this->Number->precision($credit, 2)?>                  
                  <?php endif; ?>
                  <?php if (@$co): ?>
                  <?= $this->Number->precision($branch->credit, 2)?>                  
                  <?php endif; ?>
                      
                      
                  </td>
                  <td><?php if (@$dash): ?>
                  <?= $this->Number->precision($debit, 2)?>                  
                  <?php endif; ?>
                  <?php if (@$co): ?>
                  <?= $this->Number->precision($branch->debit, 2)?>                  
                  <?php endif; ?>
                  
                  </td>

                  <?php if (@$dash): ?>
                  <?php if(stristr($balance,'-'))
                                        {
                                            $style = "style='color:red'";
                                        }
                                        elseif($balance == 0)
                                        {
                                            $style = "style='color:black'";
                                        }
                                        else{
                                            $style = "style='color:green'";
                                        }       ?>
                  <?php endif; ?>

                  <?php if (@$co): ?>
                  <?php if(stristr($branch->balance,'-'))
                                        {
                                            $style = "style='color:red'";
                                        }
                                        elseif($branch->balance == 0)
                                        {
                                            $style = "style='color:black'";
                                        }
                                        else{
                                            $style = "style='color:green'";
                                        }       ?>
                  <?php endif; ?>

                  <td>
                    <?php if (@$dash): ?>
                      <?= strtoupper($user->currency) . ' ' .  $this->Number->precision($balance, 2) ?>
                    <?php endif; ?>
                    <?php if (@$co): ?>
                      <?= strtoupper($user->currency) . ' ' .  $this->Number->precision($branch->balance, 2) ?>
                    <?php endif; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>        
          <!-- /.box -->