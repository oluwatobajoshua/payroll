<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NextOfKins Controller
 *
 * @property \App\Model\Table\NextOfKinsTable $NextOfKins
 * @method \App\Model\Entity\NextOfKin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NextOfKinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Relationships'],
        ];
        $nextOfKins = $this->paginate($this->NextOfKins);

        $this->set(compact('nextOfKins'));
    }

    /**
     * View method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nextOfKin = $this->NextOfKins->get($id, [
            'contain' => ['Employees', 'Relationships'],
        ]);

        $this->set(compact('nextOfKin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nextOfKin = $this->NextOfKins->newEmptyEntity();
        if ($this->request->is('post')) {
            $nextOfKin = $this->NextOfKins->patchEntity($nextOfKin, $this->request->getData());
            if ($this->NextOfKins->save($nextOfKin)) {
                $this->Flash->success(__('The next of kin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The next of kin could not be saved. Please, try again.'));
        }
        $employees = $this->NextOfKins->Employees->find('list', ['limit' => 200])->all();
        $relationships = $this->NextOfKins->Relationships->find('list', ['limit' => 200])->all();
        $this->set(compact('nextOfKin', 'employees', 'relationships'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nextOfKin = $this->NextOfKins->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nextOfKin = $this->NextOfKins->patchEntity($nextOfKin, $this->request->getData());
            if ($this->NextOfKins->save($nextOfKin)) {
                $this->Flash->success(__('The next of kin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The next of kin could not be saved. Please, try again.'));
        }
        $employees = $this->NextOfKins->Employees->find('list', ['limit' => 200])->all();
        $relationships = $this->NextOfKins->Relationships->find('list', ['limit' => 200])->all();
        $this->set(compact('nextOfKin', 'employees', 'relationships'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Next Of Kin id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nextOfKin = $this->NextOfKins->get($id);
        if ($this->NextOfKins->delete($nextOfKin)) {
            $this->Flash->success(__('The next of kin has been deleted.'));
        } else {
            $this->Flash->error(__('The next of kin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
