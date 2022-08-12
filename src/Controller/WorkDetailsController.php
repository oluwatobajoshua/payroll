<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WorkDetails Controller
 *
 * @property \App\Model\Table\WorkDetailsTable $WorkDetails
 * @method \App\Model\Entity\WorkDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees'],
        ];
        $workDetails = $this->paginate($this->WorkDetails);

        $this->set(compact('workDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workDetail = $this->WorkDetails->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('workDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workDetail = $this->WorkDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $workDetail = $this->WorkDetails->patchEntity($workDetail, $this->request->getData());
            if ($this->WorkDetails->save($workDetail)) {
                $this->Flash->success(__('The work detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work detail could not be saved. Please, try again.'));
        }
        $employees = $this->WorkDetails->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('workDetail', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workDetail = $this->WorkDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workDetail = $this->WorkDetails->patchEntity($workDetail, $this->request->getData());
            if ($this->WorkDetails->save($workDetail)) {
                $this->Flash->success(__('The work detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The work detail could not be saved. Please, try again.'));
        }
        $employees = $this->WorkDetails->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('workDetail', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workDetail = $this->WorkDetails->get($id);
        if ($this->WorkDetails->delete($workDetail)) {
            $this->Flash->success(__('The work detail has been deleted.'));
        } else {
            $this->Flash->error(__('The work detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
