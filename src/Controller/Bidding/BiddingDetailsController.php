<?php
declare(strict_types=1);

namespace App\Controller\Bidding;

use App\Controller\AppController;

/**
 * BiddingDetails Controller
 *
 * @property \App\Model\Table\BiddingDetailsTable $BiddingDetails
 * @method \App\Model\Entity\BiddingDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BiddingDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Biddings', 'Assets', 'Statuses'],
        ];
        $biddingDetails = $this->paginate($this->BiddingDetails);

        $this->set(compact('biddingDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Bidding Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $biddingDetail = $this->BiddingDetails->get($id, [
            'contain' => ['Biddings', 'Assets', 'Statuses'],
        ]);

        $this->set(compact('biddingDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $biddingDetail = $this->BiddingDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $biddingDetail = $this->BiddingDetails->patchEntity($biddingDetail, $this->request->getData());
            if ($this->BiddingDetails->save($biddingDetail)) {
                $this->Flash->success(__('The bidding detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bidding detail could not be saved. Please, try again.'));
        }
        $biddings = $this->BiddingDetails->Biddings->find('list', ['limit' => 200])->all();
        $assets = $this->BiddingDetails->Assets->find('list', ['limit' => 200])->all();
        $statuses = $this->BiddingDetails->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('biddingDetail', 'biddings', 'assets', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bidding Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $biddingDetail = $this->BiddingDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $biddingDetail = $this->BiddingDetails->patchEntity($biddingDetail, $this->request->getData());
            if ($this->BiddingDetails->save($biddingDetail)) {
                $this->Flash->success(__('The bidding detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bidding detail could not be saved. Please, try again.'));
        }
        $biddings = $this->BiddingDetails->Biddings->find('list', ['limit' => 200])->all();
        $assets = $this->BiddingDetails->Assets->find('list', ['limit' => 200])->all();
        $statuses = $this->BiddingDetails->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('biddingDetail', 'biddings', 'assets', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bidding Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $biddingDetail = $this->BiddingDetails->get($id);
        if ($this->BiddingDetails->delete($biddingDetail)) {
            $this->Flash->success(__('The bidding detail has been deleted.'));
        } else {
            $this->Flash->error(__('The bidding detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
