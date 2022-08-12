<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ChildrenDetails Controller
 *
 * @property \App\Model\Table\ChildrenDetailsTable $ChildrenDetails
 * @method \App\Model\Entity\ChildrenDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChildrenDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Genders'],
        ];
        $childrenDetails = $this->paginate($this->ChildrenDetails);

        $this->set(compact('childrenDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $childrenDetail = $this->ChildrenDetails->get($id, [
            'contain' => ['Employees', 'Genders'],
        ]);

        $this->set(compact('childrenDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $childrenDetail = $this->ChildrenDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $childrenDetail = $this->ChildrenDetails->patchEntity($childrenDetail, $this->request->getData());
            if ($this->ChildrenDetails->save($childrenDetail)) {
                $this->Flash->success(__('The children detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The children detail could not be saved. Please, try again.'));
        }
        $employees = $this->ChildrenDetails->Employees->find('list', ['limit' => 200])->all();
        $genders = $this->ChildrenDetails->Genders->find('list', ['limit' => 200])->all();
        $this->set(compact('childrenDetail', 'employees', 'genders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $childrenDetail = $this->ChildrenDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $childrenDetail = $this->ChildrenDetails->patchEntity($childrenDetail, $this->request->getData());
            if ($this->ChildrenDetails->save($childrenDetail)) {
                $this->Flash->success(__('The children detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The children detail could not be saved. Please, try again.'));
        }
        $employees = $this->ChildrenDetails->Employees->find('list', ['limit' => 200])->all();
        $genders = $this->ChildrenDetails->Genders->find('list', ['limit' => 200])->all();
        $this->set(compact('childrenDetail', 'employees', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Children Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $childrenDetail = $this->ChildrenDetails->get($id);
        if ($this->ChildrenDetails->delete($childrenDetail)) {
            $this->Flash->success(__('The children detail has been deleted.'));
        } else {
            $this->Flash->error(__('The children detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
