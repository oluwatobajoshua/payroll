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

        // debug($user);exit;
        //your custom logic
        //$this->loadModel('SomeOptionalUserLogs')->newLogin($user);

        $employee = \Cake\ORM\TableRegistry::get('Employees')->find()->where(['user_id' => $user['id']])->first();

        // debug($employee->id); exit;

        //If you want to use a custom redirect
        if($user->role != 'admin'){
            $event->setResult([
                'plugin' => false,
                'controller' => 'Employees',
                'action' => 'view',
                $employee->id
            ]);
        }
    }
}