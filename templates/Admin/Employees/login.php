<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
 use Cake\Core\Configure;

    $this->layout = 'CakeLte.login';
?>

<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <!--<legend><?= __d('cake_d_c/users', 'Please enter your username and password') ?></legend>-->
        <?= $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username'), 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('cake_d_c/users', 'Remember me'),
                'checked' => Configure::read('Users.RememberMe.checked')
            ]);
        }
        ?>
        <?php
        $registrationActive = Configure::read('Users.Registration.active');
        if ($registrationActive) {
            echo $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register']);
        }
        if (Configure::read('Users.Email.required')) {
            if ($registrationActive) {
                echo ' | ';
            }
            echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
        }
        ?>
    </fieldset>
    <?= implode(' ', $this->User->socialLoginList()); ?>
    <?= $this->Form->button(__d('cake_d_c/users', 'Login')); ?>
    <?= $this->Form->end() ?>
