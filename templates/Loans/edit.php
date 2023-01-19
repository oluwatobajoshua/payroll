<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<?php
$this->assign('title', __('Edit Loan'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Loans', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $loan->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($loan) ?>
  <div class="card-body">
    <?php
      $this->Form->setTemplates([
        'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
      ]);
        echo '<div class="row">';
        echo $this->Form->control('employee_id', ['options' => $employees]);
        echo $this->Form->control('loan_type_id', ['options' => $loanTypes]);
        echo $this->Form->control('principal');
        echo $this->Form->control('tenor');
        echo $this->Form->control('rate');
        echo $this->Form->control('payment_count');
        echo $this->Form->control('interest');
        echo $this->Form->control('total');
        echo $this->Form->control('deduction');
        echo $this->Form->control('date');        
        echo $this->Form->control('status_id', ['options' => $statuses]);
        echo $this->Form->control('remark');
        echo '</div>';
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $loan->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

