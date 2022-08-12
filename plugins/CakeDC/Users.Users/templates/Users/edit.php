<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>
<?php
$this->assign('title', __('Edit User'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Users', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $user->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($user) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee');
      echo $this->Form->control('role_id');
      echo $this->Form->control('username');
      echo $this->Form->control('email');
      echo $this->Form->control('token');
      echo $this->Form->control('token_expires', ['empty' => true]);
      echo $this->Form->control('api_token');
      echo $this->Form->control('activation_date', ['empty' => true]);
      echo $this->Form->control('tos_date', ['empty' => true]);
      echo $this->Form->control('password');
      echo $this->Form->control('raw_password');
      echo $this->Form->control('active', ['custom' => true]);
      echo $this->Form->control('is_superuser');
      echo $this->Form->control('passwdIsValid', ['custom' => true]);
      echo $this->Form->control('last_login', ['empty' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $user->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

