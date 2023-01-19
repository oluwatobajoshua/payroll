<?php
declare(strict_types=1);

namespace App\Controller\Auction;

use App\Controller\AppController;

/**
 * Auctions Controller
 *
 * @property \App\Model\Table\AuctionsTable $Auctions
 * @method \App\Model\Entity\Auction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuctionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Statuses'],
        ];
        $auctions = $this->paginate($this->Auctions);

        $this->set(compact('auctions'));
    }

    /**
     * View method
     *
     * @param string|null $id Auction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auction = $this->Auctions->get($id, [
            'contain' => ['Users', 'Statuses', 'AuctionDetails'],
        ]);

        $this->set(compact('auction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auction = $this->Auctions->newEmptyEntity();
        if ($this->request->is('post')) {
            $auction = $this->Auctions->patchEntity($auction, $this->request->getData());
            if ($this->Auctions->save($auction)) {
                $this->Flash->success(__('The auction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auction could not be saved. Please, try again.'));
        }
        $users = $this->Auctions->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->Auctions->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('auction', 'users', 'statuses'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function cart()
    {
        $auction = $this->Auctions->newEmptyEntity();
        if ($this->request->is('post')) {
            $auction = $this->Auctions->patchEntity($auction, $this->request->getData(),['associated' => ['AuctionDetails']]);
            $auction->status_id = 5;
            $auction->user_id = 1;
            // debug($auction);
            if ($this->Auctions->save($auction)) {
                $this->Flash->success(__('The auction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auction could not be saved. Please, try again.'));
        }
        $assets = $this->Auctions->AuctionDetails->Assets->find('list', ['limit' => 200])->all();
        $users = $this->Auctions->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->Auctions->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('auction', 'users', 'statuses','assets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Auction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auction = $this->Auctions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auction = $this->Auctions->patchEntity($auction, $this->request->getData());
            if ($this->Auctions->save($auction)) {
                $this->Flash->success(__('The auction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auction could not be saved. Please, try again.'));
        }
        $users = $this->Auctions->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->Auctions->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('auction', 'users', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Auction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auction = $this->Auctions->get($id);
        if ($this->Auctions->delete($auction)) {
            $this->Flash->success(__('The auction has been deleted.'));
        } else {
            $this->Flash->error(__('The auction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
