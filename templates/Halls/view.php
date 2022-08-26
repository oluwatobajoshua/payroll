<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hall $hall
 */
?>

<?php
$this->assign('title', __('Hall'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Halls', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($hall->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($hall->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($hall->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status Id') ?></th>
            <td><?= $this->Number->format($hall->status_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($hall->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($hall->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $hall->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $hall->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hall->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Description') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($hall->description)); ?>
  </div>
</div>

<div class="related related-diaries view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Diaries') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Diaries' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Diaries' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Phone') ?></th>
          <th><?= __('Type Of Party') ?></th>
          <th><?= __('Covers') ?></th>
          <th><?= __('Drinks') ?></th>
          <th><?= __('Hall Id') ?></th>
          <th><?= __('Date') ?></th>
          <th><?= __('Requirements') ?></th>
          <th><?= __('Total Bill') ?></th>
          <th><?= __('Deposit') ?></th>
          <th><?= __('Balance') ?></th>
          <th><?= __('Remarks') ?></th>
          <th><?= __('Status Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($hall->diaries)) { ?>
        <tr>
            <td colspan="18" class="text-muted">
              Diaries record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($hall->diaries as $diaries) : ?>
        <tr>
            <td><?= h($diaries->id) ?></td>
            <td><?= h($diaries->name) ?></td>
            <td><?= h($diaries->address) ?></td>
            <td><?= h($diaries->phone) ?></td>
            <td><?= h($diaries->type_of_party) ?></td>
            <td><?= h($diaries->covers) ?></td>
            <td><?= h($diaries->drinks) ?></td>
            <td><?= h($diaries->hall_id) ?></td>
            <td><?= h($diaries->date) ?></td>
            <td><?= h($diaries->requirements) ?></td>
            <td><?= h($diaries->total_bill) ?></td>
            <td><?= h($diaries->deposit) ?></td>
            <td><?= h($diaries->balance) ?></td>
            <td><?= h($diaries->remarks) ?></td>
            <td><?= h($diaries->status_id) ?></td>
            <td><?= h($diaries->created) ?></td>
            <td><?= h($diaries->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Diaries', 'action' => 'view', $diaries->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Diaries', 'action' => 'edit', $diaries->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diaries', 'action' => 'delete', $diaries->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $diaries->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

