<?php

namespace App\Event;

use Cake\Datasource\ModelAwareTrait;
use Cake\Event\EventListenerInterface;

class UsersListener implements EventListenerInterface
{
    use ModelAwareTrait;

    /**
     * @return string[]
     */
    public function implementedEvents(): array
    {
        return [
            \CakeDC\Users\Plugin::EVENT_AFTER_LOGIN => 'afterLogin',
        ];
    }

    /**
     * @param \Cake\Event\Event $event
     */
    public function afterLogin(\Cake\Event\Event $event)
    {
        $user = $event->getData('user');

        // debug($user);
        //your custom logic
        //$this->loadModel('SomeOptionalUserLogs')->newLogin($user);

        //If you want to use a custom redirect
        // $event->setResult([
        //     'plugin' => false,
        //     'controller' => 'Employees',
        //     'action' => 'view',
        //     $user->id
        // ]);
    }
}