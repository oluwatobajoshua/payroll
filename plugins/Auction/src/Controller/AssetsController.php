<?php
declare(strict_types=1);

namespace Auction\Controller;

use App\Controller\AppController;

/**
 * Assets Controller
 *
 * @property \Auction\Model\Table\AssetsTable $Assets
 * @method \Auction\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Statuses'],
        ];
        $assets = $this->paginate($this->Assets);

        $this->set(compact('assets'));
    }

    /**
     * View method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => ['Locations', 'Statuses', 'AuctionDetails'],
        ]);

        $this->set(compact('asset'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asset = $this->Assets->newEmptyEntity();
        if ($this->request->is('post')) {
            $asset = $this->Assets->patchEntity($asset, $this->request->getData());
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asset could not be saved. Please, try again.'));
        }
        $locations = $this->Assets->Locations->find('list', ['limit' => 200])->all();
        $statuses = $this->Assets->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('asset', 'locations', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asset = $this->Assets->patchEntity($asset, $this->request->getData());
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asset could not be saved. Please, try again.'));
        }
        $locations = $this->Assets->Locations->find('list', ['limit' => 200])->all();
        $statuses = $this->Assets->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('asset', 'locations', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asset = $this->Assets->get($id);
        if ($this->Assets->delete($asset)) {
            $this->Flash->success(__('The asset has been deleted.'));
        } else {
            $this->Flash->error(__('The asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
