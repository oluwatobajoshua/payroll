<section class="invoice p-3 mb-3 no-print">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo __('Form'); ?></h3>
    <!-- <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
      <div class="col-md-3" style="width:350px">
        <label class="form-check-label" for="">General Pay Advice</label>
        <?php echo $this->Form->checkbox('gpa', ['hiddenField' => true]) ?> <br>
        <label class="form-check-label" for="">Service Charge Pay Advice</label>
        <?php echo $this->Form->checkbox('spa', ['hiddenField' => true]) ?> <br>
        <label class="form-check-label" for="">Employees</label>
        <?php echo $this->Form->select('employee', $employees, ['empty' => "Select Employee", 'title' => 'Select an employee to add transaction', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']); ?>
      </div>
    </form>
    <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm1'>
      <div class="col-md-3" style="width:300px">
        <label class="form-check-label" for="">General Pay Advice</label>
        <?php echo $this->Form->checkbox('gpa', ['hiddenField' => true]) ?> <br>
        <label class="form-check-label" for="">Service Charge Pay Advice</label>
        <?php echo $this->Form->checkbox('spa', ['hiddenField' => true]) ?> <br>
        <label class="form-check-label" for="">Department</label>
        <?php echo $this->Form->select('department', $depts, ['empty' => "Select Department", 'title' => 'Select an employee to add transaction', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm1").submit();']); ?>
      </div>
    </form> -->
  </div>
  <?= $this->Form->create(null, ['id' => 'empForm']) ?>
  <div class="callout callout-info">
    <div class="row">
      <?php
      $this->Form->setTemplates([
        'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
      ]);

      echo $this->Form->control('slip_type', ['multiple' => true,'options'=>['gpa' => 'General Pay Slip','spa' => 'Service Charge Slip'],'title' => 'Hold down the control key to select multiple', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
      // echo $this->Form->control('spa', ['label'=>'Service Charge Slip','type' => 'checkbox', 'empty' => 'Select a cadre', 'title' => 'Service Charge Pay Advice', 'rel' => 'tooltip']);
      echo $this->Form->control('employee', ['options' => $employees, 'empty' => 'Select Employee', 'title' => 'Select an employee to print for one employee', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);
      echo $this->Form->control('section', ['options' => $depts, 'empty' => 'Select Section', 'title' => 'Please select gpa or spa before selecting a section', 'rel' => 'tooltip', 'onChange' => 'document.getElementById("empForm").submit();']);

      ?>
    </div>
  </div>
  <?= $this->Form->end() ?>
</section>
<!-- Main content -->
<section class="invoice p-3 mb-3">
  <?php echo $this->element('employee-pay-advice'); ?>
</section>
<!-- /.content -->