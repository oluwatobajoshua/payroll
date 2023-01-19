<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BiddingDetail $biddingDetail
 */
?>
<?php
$this->assign('title', __('Edit Bidding Detail'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Bidding Details', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $biddingDetail->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($biddingDetail) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('bidding_id', ['options' => $biddings]);
      echo $this->Form->control('asset_id', ['options' => $assets]);
      echo $this->Form->control('qty');
      echo $this->Form->control('approved_qty');
      echo $this->Form->control('price');
      echo $this->Form->control('total_payable');
      echo $this->Form->control('approved_payable');
      echo $this->Form->control('status_id', ['options' => $statuses]);
      echo $this->Form->control('remark');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $biddingDetail->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $biddingDetail->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

