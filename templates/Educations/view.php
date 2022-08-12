<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Education $education
 */
?>

<?php
$this->assign('title', __('Education'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Educations', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($education->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $education->has('employee') ? $this->Html->link($education->employee->id, ['controller' => 'Employees', 'action' => 'view', $education->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Institution') ?></th>
            <td><?= h($education->institution) ?></td>
        </tr>
        <tr>
            <th><?= __('Highest Education') ?></th>
            <td><?= $education->has('highest_education') ? $this->Html->link($education->highest_education->name, ['controller' => 'HighestEducations', 'action' => 'view', $education->highest_education->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Course Of Study') ?></th>
            <td><?= h($education->course_of_study) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($education->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($education->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($education->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($education->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $education->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $education->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $education->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


