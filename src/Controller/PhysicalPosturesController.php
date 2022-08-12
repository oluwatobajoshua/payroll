<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PhysicalPostures Controller
 *
 * @property \App\Model\Table\PhysicalPosturesTable $PhysicalPostures
 * @method \App\Model\Entity\PhysicalPosture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhysicalPosturesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $physicalPostures = $this->paginate($this->PhysicalPostures);

        $this->set(compact('physicalPostures'));
    }

    /**
     * View method
     *
     * @param string|null $id Physical Posture id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $physicalPosture = $this->PhysicalPostures->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('physicalPosture'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $physicalPosture = $this->PhysicalPostures->newEmptyEntity();
        if ($this->request->is('post')) {
            $physicalPosture = $this->PhysicalPostures->patchEntity($physicalPosture, $this->request->getData());
            if ($this->PhysicalPostures->save($physicalPosture)) {
                $this->Flash->success(__('The physical posture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The physical posture could not be saved. Please, try again.'));
        }
        $this->set(compact('physicalPosture'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Physical Posture id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $physicalPosture = $this->PhysicalPostures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $physicalPosture = $this->PhysicalPostures->patchEntity($physicalPosture, $this->request->getData());
            if ($this->PhysicalPostures->save($physicalPosture)) {
                $this->Flash->success(__('The physical posture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The physical posture could not be saved. Please, try again.'));
        }
        $this->set(compact('physicalPosture'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Physical Posture id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $physicalPosture = $this->PhysicalPostures->get($id);
        if ($this->PhysicalPostures->delete($physicalPosture)) {
            $this->Flash->success(__('The physical posture has been deleted.'));
        } else {
            $this->Flash->error(__('The physical posture could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
