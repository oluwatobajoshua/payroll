<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LoanTypes Controller
 *
 * @property \App\Model\Table\LoanTypesTable $LoanTypes
 * @method \App\Model\Entity\LoanType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoanTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $loanTypes = $this->paginate($this->LoanTypes);

        $this->set(compact('loanTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Loan Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loanType = $this->LoanTypes->get($id, [
            'contain' => ['Loans'],
        ]);

        $this->set(compact('loanType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loanType = $this->LoanTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $loanType = $this->LoanTypes->patchEntity($loanType, $this->request->getData());
            if ($this->LoanTypes->save($loanType)) {
                $this->Flash->success(__('The loan type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan type could not be saved. Please, try again.'));
        }
        $this->set(compact('loanType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loanType = $this->LoanTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loanType = $this->LoanTypes->patchEntity($loanType, $this->request->getData());
            if ($this->LoanTypes->save($loanType)) {
                $this->Flash->success(__('The loan type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan type could not be saved. Please, try again.'));
        }
        $this->set(compact('loanType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loanType = $this->LoanTypes->get($id);
        if ($this->LoanTypes->delete($loanType)) {
            $this->Flash->success(__('The loan type has been deleted.'));
        } else {
            $this->Flash->error(__('The loan type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
