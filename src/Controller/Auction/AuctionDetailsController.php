<?php
declare(strict_types=1);

namespace App\Controller\Auction;

use App\Controller\AppController;

/**
 * AuctionDetails Controller
 *
 * @property \App\Model\Table\AuctionDetailsTable $AuctionDetails
 * @method \App\Model\Entity\AuctionDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuctionDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Auctions', 'Assets', 'Statuses'],
        ];
        $auctionDetails = $this->paginate($this->AuctionDetails);

        $this->set(compact('auctionDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Auction Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auctionDetail = $this->AuctionDetails->get($id, [
            'contain' => ['Auctions', 'Assets', 'Statuses'],
        ]);

        $this->set(compact('auctionDetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auctionDetail = $this->AuctionDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $auctionDetail = $this->AuctionDetails->patchEntity($auctionDetail, $this->request->getData());
            if ($this->AuctionDetails->save($auctionDetail)) {
                $this->Flash->success(__('The auction detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auction detail could not be saved. Please, try again.'));
        }
        $auctions = $this->AuctionDetails->Auctions->find('list', ['limit' => 200])->all();
        $assets = $this->AuctionDetails->Assets->find('list', ['limit' => 200])->all();
        $statuses = $this->AuctionDetails->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('auctionDetail', 'auctions', 'assets', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Auction Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auctionDetail = $this->AuctionDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auctionDetail = $this->AuctionDetails->patchEntity($auctionDetail, $this->request->getData());
            if ($this->AuctionDetails->save($auctionDetail)) {
                $this->Flash->success(__('The auction detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auction detail could not be saved. Please, try again.'));
        }
        $auctions = $this->AuctionDetails->Auctions->find('list', ['limit' => 200])->all();
        $assets = $this->AuctionDetails->Assets->find('list', ['limit' => 200])->all();
        $statuses = $this->AuctionDetails->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('auctionDetail', 'auctions', 'assets', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Auction Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auctionDetail = $this->AuctionDetails->get($id);
        if ($this->AuctionDetails->delete($auctionDetail)) {
            $this->Flash->success(__('The auction detail has been deleted.'));
        } else {
            $this->Flash->error(__('The auction detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
