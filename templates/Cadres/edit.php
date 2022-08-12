<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cadre $cadre
 */
?>
<?php
$this->assign('title', __('Edit Cadre'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Cadres', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $cadre->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($cadre) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('tax_due');
      echo $this->Form->control('union_due');
      echo $this->Form->control('pension');
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $cadre->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $cadre->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

