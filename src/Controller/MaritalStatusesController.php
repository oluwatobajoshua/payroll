<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MaritalStatuses Controller
 *
 * @property \App\Model\Table\MaritalStatusesTable $MaritalStatuses
 * @method \App\Model\Entity\MaritalStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaritalStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $maritalStatuses = $this->paginate($this->MaritalStatuses);

        $this->set(compact('maritalStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maritalStatus = $this->MaritalStatuses->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('maritalStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maritalStatus = $this->MaritalStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $maritalStatus = $this->MaritalStatuses->patchEntity($maritalStatus, $this->request->getData());
            if ($this->MaritalStatuses->save($maritalStatus)) {
                $this->Flash->success(__('The marital status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marital status could not be saved. Please, try again.'));
        }
        $this->set(compact('maritalStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maritalStatus = $this->MaritalStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maritalStatus = $this->MaritalStatuses->patchEntity($maritalStatus, $this->request->getData());
            if ($this->MaritalStatuses->save($maritalStatus)) {
                $this->Flash->success(__('The marital status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marital status could not be saved. Please, try again.'));
        }
        $this->set(compact('maritalStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maritalStatus = $this->MaritalStatuses->get($id);
        if ($this->MaritalStatuses->delete($maritalStatus)) {
            $this->Flash->success(__('The marital status has been deleted.'));
        } else {
            $this->Flash->error(__('The marital status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
