<?php

/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Users', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($user->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Api Token') ?></th>
            <td><?= h($user->api_token) ?></td>
        </tr>
        <tr>
            <th><?= __('Raw Password') ?></th>
            <td><?= h($user->raw_password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $this->Number->format($user->employee) ?></td>
        </tr>
        <tr>
            <th><?= __('Role Id') ?></th>
            <td><?= $this->Number->format($user->role_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Superuser') ?></th>
            <td><?= $this->Number->format($user->is_superuser) ?></td>
        </tr>
        <tr>
            <th><?= __('Token Expires') ?></th>
            <td><?= h($user->token_expires) ?></td>
        </tr>
        <tr>
            <th><?= __('Activation Date') ?></th>
            <td><?= h($user->activation_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Tos Date') ?></th>
            <td><?= h($user->tos_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Login') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('PasswdIsValid') ?></th>
            <td><?= $user->passwdIsValid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
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
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


