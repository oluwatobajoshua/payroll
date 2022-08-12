<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>

<?php
$this->assign('title', __('Profile'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Profiles', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($profile->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($profile->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($profile->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($profile->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($profile->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Passport') ?></th>
            <td><?= h($profile->passport) ?></td>
        </tr>
        <tr>
            <th><?= __('Sign') ?></th>
            <td><?= h($profile->sign) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $profile->has('status') ? $this->Html->link($profile->status->name, ['controller' => 'Statuses', 'action' => 'view', $profile->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Account Id') ?></th>
            <td><?= $this->Number->format($profile->account_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Dob') ?></th>
            <td><?= h($profile->dob) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $profile->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


