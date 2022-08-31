<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceCharge $serviceCharge
 */
?>

<?php
$this->assign('title', __('Service Charge'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Service Charges', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($serviceCharge->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $serviceCharge->has('grade') ? $this->Html->link($serviceCharge->grade->name, ['controller' => 'Grades', 'action' => 'view', $serviceCharge->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $serviceCharge->has('company') ? $this->Html->link($serviceCharge->company->name, ['controller' => 'Companies', 'action' => 'view', $serviceCharge->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($serviceCharge->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($serviceCharge->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Ileya Xmas Bonus') ?></th>
            <td><?= $this->Number->format($serviceCharge->ileya_xmas_bonus) ?></td>
        </tr>
        <tr>
            <th><?= __('End Of Year Bonus') ?></th>
            <td><?= $this->Number->format($serviceCharge->end_of_year_bonus) ?></td>
        </tr>
        <tr>
            <th><?= __('Njic Arrears') ?></th>
            <td><?= $this->Number->format($serviceCharge->njic_arrears) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($serviceCharge->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($serviceCharge->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $serviceCharge->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCharge->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceCharge->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


