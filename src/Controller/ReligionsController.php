<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Religions Controller
 *
 * @property \App\Model\Table\ReligionsTable $Religions
 * @method \App\Model\Entity\Religion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReligionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $religions = $this->paginate($this->Religions);

        $this->set(compact('religions'));
    }

    /**
     * View method
     *
     * @param string|null $id Religion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $religion = $this->Religions->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('religion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $religion = $this->Religions->newEmptyEntity();
        if ($this->request->is('post')) {
            $religion = $this->Religions->patchEntity($religion, $this->request->getData());
            if ($this->Religions->save($religion)) {
                $this->Flash->success(__('The religion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The religion could not be saved. Please, try again.'));
        }
        $this->set(compact('religion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Religion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $religion = $this->Religions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $religion = $this->Religions->patchEntity($religion, $this->request->getData());
            if ($this->Religions->save($religion)) {
                $this->Flash->success(__('The religion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The religion could not be saved. Please, try again.'));
        }
        $this->set(compact('religion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Religion id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $religion = $this->Religions->get($id);
        if ($this->Religions->delete($religion)) {
            $this->Flash->success(__('The religion has been deleted.'));
        } else {
            $this->Flash->error(__('The religion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
