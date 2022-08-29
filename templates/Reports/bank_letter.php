        <section class="invoice p-3 no-print">
          <h5 class="box-title"><?php echo __('Bank Letter'); ?></h5>
        </section>
        <div class="card card-primary card-outline no-print">
          <?= $this->Form->create($company) ?>
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
        <!-- Main content -->
        <section class="invoice p-3">
          <?php echo $this->element('bank-letter'); ?>
        </section>
        <!-- /.content -->