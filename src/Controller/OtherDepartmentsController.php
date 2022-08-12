<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OtherDepartments Controller
 *
 * @property \App\Model\Table\OtherDepartmentsTable $OtherDepartments
 * @method \App\Model\Entity\OtherDepartment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OtherDepartmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Sections'],
        ];
        $otherDepartments = $this->paginate($this->OtherDepartments);

        $this->set(compact('otherDepartments'));
    }

    /**
     * View method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $otherDepartment = $this->OtherDepartments->get($id, [
            'contain' => ['Employees', 'Sections'],
        ]);

        $this->set(compact('otherDepartment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $otherDepartment = $this->OtherDepartments->newEmptyEntity();
        if ($this->request->is('post')) {
            $otherDepartment = $this->OtherDepartments->patchEntity($otherDepartment, $this->request->getData());
            if ($this->OtherDepartments->save($otherDepartment)) {
                $this->Flash->success(__('The other department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The other department could not be saved. Please, try again.'));
        }
        $employees = $this->OtherDepartments->Employees->find('list', ['limit' => 200])->all();
        $sections = $this->OtherDepartments->Sections->find('list', ['limit' => 200])->all();
        $this->set(compact('otherDepartment', 'employees', 'sections'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $otherDepartment = $this->OtherDepartments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $otherDepartment = $this->OtherDepartments->patchEntity($otherDepartment, $this->request->getData());
            if ($this->OtherDepartments->save($otherDepartment)) {
                $this->Flash->success(__('The other department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The other department could not be saved. Please, try again.'));
        }
        $employees = $this->OtherDepartments->Employees->find('list', ['limit' => 200])->all();
        $sections = $this->OtherDepartments->Sections->find('list', ['limit' => 200])->all();
        $this->set(compact('otherDepartment', 'employees', 'sections'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Other Department id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $otherDepartment = $this->OtherDepartments->get($id);
        if ($this->OtherDepartments->delete($otherDepartment)) {
            $this->Flash->success(__('The other department has been deleted.'));
        } else {
            $this->Flash->error(__('The other department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
