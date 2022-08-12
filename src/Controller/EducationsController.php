<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Educations Controller
 *
 * @property \App\Model\Table\EducationsTable $Educations
 * @method \App\Model\Entity\Education[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EducationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'HighestEducations'],
        ];
        $educations = $this->paginate($this->Educations);

        $this->set(compact('educations'));
    }

    /**
     * View method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => ['Employees', 'HighestEducations'],
        ]);

        $this->set(compact('education'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $education = $this->Educations->newEmptyEntity();
        if ($this->request->is('post')) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The education could not be saved. Please, try again.'));
        }
        $employees = $this->Educations->Employees->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Educations->HighestEducations->find('list', ['limit' => 200])->all();
        $this->set(compact('education', 'employees', 'highestEducations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $education = $this->Educations->patchEntity($education, $this->request->getData());
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The education could not be saved. Please, try again.'));
        }
        $employees = $this->Educations->Employees->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Educations->HighestEducations->find('list', ['limit' => 200])->all();
        $this->set(compact('education', 'employees', 'highestEducations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Education id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $education = $this->Educations->get($id);
        if ($this->Educations->delete($education)) {
            $this->Flash->success(__('The education has been deleted.'));
        } else {
            $this->Flash->error(__('The education could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
