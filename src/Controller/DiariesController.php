<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diaries Controller
 *
 * @property \App\Model\Table\DiariesTable $Diaries
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiariesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Halls', 'Statuses'],
        ];
        $diaries = $this->paginate($this->Diaries);

        $this->set(compact('diaries'));
    }

    /**
     * View method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diary = $this->Diaries->get($id, [
            'contain' => ['Halls', 'Statuses'],
        ]);

        $this->set(compact('diary'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diary = $this->Diaries->newEmptyEntity();
        if ($this->request->is('post')) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->getData());
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $halls = $this->Diaries->Halls->find('list', ['limit' => 200])->all();
        $statuses = $this->Diaries->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('diary', 'halls', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diary = $this->Diaries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->getData());
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $halls = $this->Diaries->Halls->find('list', ['limit' => 200])->all();
        $statuses = $this->Diaries->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('diary', 'halls', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diary = $this->Diaries->get($id);
        if ($this->Diaries->delete($diary)) {
            $this->Flash->success(__('The diary has been deleted.'));
        } else {
            $this->Flash->error(__('The diary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
