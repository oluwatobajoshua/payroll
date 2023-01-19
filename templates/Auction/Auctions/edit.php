<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Auction $auction
 */
?>
<?php
$this->assign('title', __('Edit Auction'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Auctions', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $auction->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($auction) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('user_id', ['options' => $users]);
      echo $this->Form->control('asset_qty');
      echo $this->Form->control('amount');
      echo $this->Form->control('approved_amount');
      echo $this->Form->control('status_id', ['options' => $statuses]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $auction->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $auction->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

