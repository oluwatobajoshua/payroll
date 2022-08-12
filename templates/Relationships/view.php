<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relationship $relationship
 */
?>

<?php
$this->assign('title', __('Relationship'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Relationships', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($relationship->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($relationship->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($relationship->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($relationship->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($relationship->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $relationship->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relationship->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-nextOfKins view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Next Of Kins') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'NextOfKins' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'NextOfKins' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Relationship Id') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Phone') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($relationship->next_of_kins)) { ?>
        <tr>
            <td colspan="10" class="text-muted">
              Next Of Kins record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($relationship->next_of_kins as $nextOfKins) : ?>
        <tr>
            <td><?= h($nextOfKins->id) ?></td>
            <td><?= h($nextOfKins->employee_id) ?></td>
            <td><?= h($nextOfKins->name) ?></td>
            <td><?= h($nextOfKins->relationship_id) ?></td>
            <td><?= h($nextOfKins->address) ?></td>
            <td><?= h($nextOfKins->phone) ?></td>
            <td><?= h($nextOfKins->email) ?></td>
            <td><?= h($nextOfKins->created) ?></td>
            <td><?= h($nextOfKins->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'NextOfKins', 'action' => 'view', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'NextOfKins', 'action' => 'edit', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextOfKins', 'action' => 'delete', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $nextOfKins->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

